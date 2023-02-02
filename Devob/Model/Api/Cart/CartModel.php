<?php
namespace Tha\Devob\Model\Api\Cart;

use Magento\Checkout\Model\Session;
use Magento\Quote\Model\QuoteRepository;
use Tha\Devob\Helper\Api\CartHelper;

class CartModel{
    protected $quoteRepository;
    protected $cartHelper;
    protected $checkoutSession;

    public function __construct(
        QuoteRepository $quoteRepository,
        Session $checkoutSession,
        CartHelper $cartHelper
    )
    {
        $this->quoteRepository = $quoteRepository;
        $this->checkoutSession = $checkoutSession;
        $this->cartHelper = $cartHelper;
    }

    public function getCartDetail($cart_id = null)
    {
        $quote = $this->quoteRepository->get($cart_id);
        return $this->cartHelper->formatCartData($quote);
    }

    public function getCartData()
    {
        $quote = $this->checkoutSession->getQuote();
        return $this->cartHelper->formatCartData($quote);
    }

    public function addToCart()
    {
        return $this->getCartData();
    }
}

?>