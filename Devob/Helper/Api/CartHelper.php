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
        $cart = $this->cartDetailFactory->create();
        $cart->setId($quote->getId());
        $cart->setStoreId($quote->getStoreId());
        $cart->setItemCount($quote->getItemsCount());
        $cart->setItemQty($quote->getItemsQty());
        $cart->setCartApplyRules($quote->getAppliedRuleIds());
        $cart->setGlabalCurrencyCode($quote->getGlobalCurrencyCode());
        $cart->setQuoteCurrencyCode($quote->getData("quote_currency_code"));
        $cart->setPrices($this->formatQuotePrices($quote));
        $cart->setItems($this->getQuoteItems($quote));
        $cart->setCreatedAt($quote->getCreatedAt());
        $cart->setUpdatedAt($quote->getUpdatedAt());
        return $cart;
    }

    public function getQuoteItems($quote)
    {
        $_items = null;
        if ($items = $quote->getItems()) {
            foreach ($items as $item) {
                $_items[] = $this->formatItem($item);
            }
            return $items;
        }
    }

    public function formatItem($item)
    {
        $cartItem = $this->cartItemFactory->create();
        $cartItem->setId($item->getItemId());
        $cartItem->setName($item->getName());
        $cartItem->setQuoteId($item->getQuoteId());
        $cartItem->setCreatedAt($item->getCreatedAt());
        $cartItem->setUpdatedAt($item->getUpdatedAt());
        $cartItem->setStoreId($item->getStoreId());
        $cartItem->setItemQty($item->getQty());
        $cartItem->setType($item->getProductType());
        $cartItem->setPrices($this->formatQuoteItemPrice($item));
        $cartItem->setApplyRuleIds($item->getAppliedRuleIds()); //applied_rule_ids
        return $cartItem;
    }

    public function formatQuoteItemPrice($item)
    {
        $prices = null;
        $prices[] = $this->getBaseAttributeData(...["price", $item->getData("price")]);
        $prices[] = $this->getBaseAttributeData(...["price_incl_tax", $item->getData("price_incl_tax")]);
        $prices[] = $this->getBaseAttributeData(...["discount_tax_compensation_amount", $item->getData("discount_tax_compensation_amount")]);
        $prices[] = $this->getBaseAttributeData(...["tax_amount", $item->getData("tax_amount")]);
        $prices[] = $this->getBaseAttributeData(...["tax_percent", $item->getData("tax_percent")]);
        $prices[] = $this->getBaseAttributeData(...["discount_amount", $item->getData("discount_amount")]);
        $prices[] = $this->getBaseAttributeData(...["discount_percent", $item->getData("discount_percent")]);
        return $prices;
    }

    public function formatQuotePrices($quote)
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