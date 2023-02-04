<?php
namespace Tha\Devob\Model\Api\Cart;

use Magento\Catalog\Model\ProductRepository;
use Magento\Checkout\Model\Session;
use Magento\Framework\App\Request\Http;
use Magento\Quote\Model\QuoteRepository;
use Tha\Devob\Helper\Api\CartHelper;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Checkout\Model\Cart as CustomerCart;
use Magento\Checkout\Model\Cart\RequestQuantityProcessor;
use Magento\Framework\Event\ManagerInterface as EventManagerInterface;

class CartModel{
    protected $quoteRepository;
    protected $cartHelper;
    protected $_checkoutSession;
    protected $request;
    protected $_objectManager;
    protected $productRepository;
    protected $cart;
    protected $_eventManager;
    protected $quantityProcessor;

    public function __construct(
        QuoteRepository $quoteRepository,
        Session $checkoutSession,
        CartHelper $cartHelper,
        Http $request,
        \Magento\Framework\ObjectManagerInterface $objectManager,
        ProductRepository $productRepository,
        CustomerCart $cart,
        EventManagerInterface $_eventManager,
        RequestQuantityProcessor $quantityProcessor
    )
    {
        $this->quoteRepository = $quoteRepository;
        $this->_checkoutSession = $checkoutSession;
        $this->cartHelper = $cartHelper;
        $this->request = $request;
        $this->_objectManager = $objectManager;
        $this->productRepository = $productRepository;
        $this->cart = $cart;
        $this->_eventManager = $_eventManager;
        $this->quantityProcessor = $quantityProcessor ?: $this->_objectManager->get(RequestQuantityProcessor::class);
    }

    public function getCartDetail($cart_id = null)
    {
        $quote = $this->quoteRepository->get($cart_id);
        return $this->cartHelper->formatCartData($quote);
    }

    public function getCartData()
    {
        $quote = $this->_checkoutSession->getQuote();
        if ($id = $quote->getId()){
            $quote = $this->quoteRepository->get($id);
        }
        return $this->cartHelper->formatCartData($quote);
    }

    public function addToCart()
    {
        $product = $this->_initProduct();
        $params = $this->request->getParams();
        try {
            if (isset($params['qty'])) {
                $filter = new \Zend_Filter_LocalizedToNormalized(
                    ['locale' => $this->_objectManager->get(
                        \Magento\Framework\Locale\ResolverInterface::class
                    )->getLocale()]
                );
                $params['qty'] = $filter->filter($params['qty']);
            }

            $this->cart->addProduct($product, $params);
            $this->cart->save();

            $this->_eventManager->dispatch(
                'checkout_cart_add_product_complete',
                ['product' => $product, 'request' => $this->request]
            );


        } catch (\Magento\Framework\Exception\LocalizedException $e) {
            // if ($this->_checkoutSession->getUseNotice(true)) {
            //     $this->messageManager->addNoticeMessage(
            //         $this->_objectManager->get(\Magento\Framework\Escaper::class)->escapeHtml($e->getMessage())
            //     );
            // } else {
            //     $messages = array_unique(explode("\n", $e->getMessage()));
            //     foreach ($messages as $message) {
            //         $this->messageManager->addErrorMessage(
            //             $this->_objectManager->get(\Magento\Framework\Escaper::class)->escapeHtml($message)
            //         );
            //     }
            // }

            // $url = $this->_checkoutSession->getRedirectUrl(true);
            // if (!$url) {
            //     $url = $this->_redirect->getRedirectUrl($this->getCartUrl());
            // }

            // return $this->goBack($url);
        } catch (\Exception $e) {
            throw $e;
            // $this->messageManager->addExceptionMessage(
            //     $e,
            //     __('We can\'t add this item to your shopping cart right now.')
            // );
            // $this->_objectManager->get(\Psr\Log\LoggerInterface::class)->critical($e);
            // return $this->goBack();
        }

        return $this->getCartData();
    }

    public function updateQty()
    {
        $params = $this->request->getParams();
        if (isset($params["item_id"]) && isset($params["qty"]) ) {
            $format_param = array((int) $params["item_id"] => array("qty" => $params["qty"]));
            if (!$this->cart->getCustomerSession()->getCustomerId() && $this->cart->getQuote()->getCustomerId()) {
                $this->cart->getQuote()->setCustomerId(null);
            }
            $cartData = $this->quantityProcessor->process($format_param);
            $cartData = $this->cart->suggestItemsQty($cartData);
            $this->cart->updateItems($cartData)->save();
            return $this->getCartData();

        }else {
            \Magento\Framework\Exception\InputException::requiredField("item_id & qty");
        }
    }

    public function emptyCart()
    {
        try {
            $this->cart->truncate()->save();
        } catch (\Magento\Framework\Exception\LocalizedException $exception) {
            \Magento\Framework\Exception\InputException::requiredField($exception->getMessage());
        } catch (\Exception $exception) {
            \Magento\Framework\Exception\InputException::requiredField("We can\'t update the shopping cart.");
        }
        return $this->getCartData();
    }

    /**
     * Initialize product instance from request data
     *
     * @return \Magento\Catalog\Model\Product|false
     */
    protected function _initProduct()
    {
        $productId = (int)$this->request->getParam('product');
        if ($productId) {
            $storeId = $this->_objectManager->get(
                \Magento\Store\Model\StoreManagerInterface::class
            )->getStore()->getId();
            try {
                return $this->productRepository->getById($productId, false, $storeId);
            } catch (NoSuchEntityException $e) {
                return false;
            }
        }
        return false;
    }
}

?>
