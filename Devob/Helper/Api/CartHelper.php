<?php

namespace Tha\Devob\Helper\Api;

use Magento\Framework\App\Helper\AbstractHelper;
use Tha\Devob\Model\Api\Data\BaseAttributesFactory;
use Tha\Devob\Model\Api\Data\Cart\CartDetailFactory;
use Tha\Devob\Model\Api\Data\Cart\CartItemFactory;

class CartHelper extends AbstractHelper
{
    protected $cartDetailFactory;
    protected $cartItemFactory;
    protected $baseAttributesFactory;
    public function __construct(
        CartDetailFactory $cartDetailFactory,
        CartItemFactory $cartItemFactory,
        BaseAttributesFactory $baseAttributesFactory
    )
    {
        $this->cartDetailFactory = $cartDetailFactory;
        $this->cartItemFactory = $cartItemFactory;
        $this->baseAttributesFactory = $baseAttributesFactory;
    }

    public function formatCartData($quote = null)
    {
        # code...
        $cart = $this->cartDetailFactory->create();
        $cart->setId($quote->getId());
        $cart->setStoreId($quote->getStoreId());
        $cart->setItemCount($quote->getItemsCount());
        $cart->setItemQty($quote->getItemsQty());
        $cart->setCartApplyRules($quote->getAppliedRuleIds());
        $cart->setGlabalCurrencyCode($quote->getGlobalCurrencyCode());
        $cart->setQuoteCurrencyCode($quote->getData("quote_currency_code"));
        $cart->setPrices($this->formatPrices($quote));

        $cartItemFactory = $this->cartItemFactory->create();
        return $cart->setItems([$cartItemFactory]);
    }

    public function formatPrices($quote)
    {
        $prices = null;
        $prices[] = $this->getBaseAttributeData(...["subtotal", $quote->getData("subtotal")]);
        $prices[] = $this->getBaseAttributeData(...["subtotal_with_discount", $quote->getData("subtotal_with_discount")]);
        $prices[] = $this->getBaseAttributeData(...["grand_total", $quote->getData("grand_total")]);
        $prices[] = $this->getBaseAttributeData(...["shipping_amount", $quote->getData("shipping_amount")]);
        return $prices;
    }

    public function getBaseAttributeData($key= "", $value = null, $type="")
    {
        $baseAttributes = $this->baseAttributesFactory->create();
        $baseAttributes->setData(['key' => $key, "value" => $value, "type" => $type]);
        return $baseAttributes;
    }
}

?>