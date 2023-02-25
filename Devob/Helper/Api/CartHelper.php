<?php

namespace Tha\Devob\Helper\Api;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\Exception\NoSuchEntityException;
use Tha\Devob\Model\Api\Data\BaseAttributesFactory;
use Tha\Devob\Model\Api\Data\Cart\CartDetailFactory;
use Tha\Devob\Model\Api\Data\Cart\CartItemFactory;

class CartHelper extends AbstractHelper
{
    protected $cartDetailFactory;
    protected $cartItemFactory;
    protected $baseAttributesFactory;
    protected $dataAttributesFactory;
    protected $configurable;
    protected $productHelp;
    protected $bunderRender;

    public function __construct(
        CartDetailFactory $cartDetailFactory,
        CartItemFactory $cartItemFactory,
        BaseAttributesFactory $baseAttributesFactory,
        \Tha\Devob\Model\Api\Data\DataAttributesFactory $dataAttributesFactory,
        \Magento\ConfigurableProduct\Block\Cart\Item\Renderer\Configurable $configurable,
        \Magento\Bundle\Block\Checkout\Cart\Item\Renderer $bunderRender,
        ProductHelp $productHelp
    ) {
        $this->cartDetailFactory = $cartDetailFactory;
        $this->cartItemFactory = $cartItemFactory;
        $this->baseAttributesFactory = $baseAttributesFactory;
        $this->dataAttributesFactory = $dataAttributesFactory;
        $this->configurable = $configurable;
        $this->bunderRender = $bunderRender;
        $this->productHelp = $productHelp;
    }

    public function formatCartData($quote = null)
    {
        $cart = $this->cartDetailFactory->create();
        try {
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
        } catch (NoSuchEntityException $exception) {
        }
        return $cart;
    }

    public function getQuoteItems($quote)
    {
        $_items = null;
        if ($items = $quote->getItems()) {
            foreach ($items as $item) {
                $_items[] = $this->formatItem($item);
            }
            return $_items;
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
        $cartItem->setItemQty((int) $item->getQty());
        $cartItem->setType($item->getProductType());
        $cartItem->setPrices($this->formatQuoteItemPrice($item));
        $cartItem->setApplyRuleIds($item->getAppliedRuleIds()); //applied_rule_ids
        $cartItem->setItemOptions($item->getOptions());
        $cartItem->setRequestOptionHtml($this->getItemBuyRequestHtml($item));
        $cartItem->setImagePath($this->productHelp->product_image_path($item->getProduct()));

        return $cartItem;
    }

    public function getItemBuyRequestHtml($item)
    {
        $request_html = null;
        if ($item->getProduct()->getTypeId() == "bundle") {
            $optionList = $this->bunderRender->setItem($item)->getOptionList();
            if (count($optionList)) {
                foreach ($optionList as $option) {
                    $request_html[] = $this->getDataAttributeData(...[$option["option_id"] ?? null, null, $option["option_value"] ?? null, $option["label"], $option["value"][0]]);
                }
            }
        } elseif ($item->getProduct()->getTypeId() == "configurable") {
            $optionList = $this->configurable->setItem($item)->getOptionList();
            if (count($optionList)) {
                foreach ($optionList as $option) {
                    $request_html[] = $this->getDataAttributeData(...[$option["option_id"], null, $option["option_value"], $option["label"], $option["value"]]);
                }
            }
        }
        return $request_html;
    }

    public function getItemOptions($item)
    {
        $_item_options = null;
        $item_options = $item->getOptions();
        if (count($item_options)) {
            foreach ($item_options as $option) {
                $_item_options[] = $this->getDataAttributeData($option->getOptionId(), $option->getCode(), $option->getValue());
            }
        }
        return $_item_options;
        // option_id:"130"
        // item_id:"59"
        // product_id:"1178"
        // code:"info_buyRequest"
        // value:"{"qty":"1","_tha_sid":"m8jit1kjmjpbvoal0d477kg3m5","product":"1178","super_attribute":{"144":"166","93":"50"}}"
    }

    public function formatQuoteItemPrice($item)
    {
        $prices = null;
        $prices[] = $this->getBaseAttributeData(...["price", $item->getData("price")]);
        $prices[] = $this->getBaseAttributeData(...["tax_amount", $item->getData("tax_amount")]);
        $prices[] = $this->getBaseAttributeData(...["tax_percent", $item->getData("tax_percent")]);
        $prices[] = $this->getBaseAttributeData(...["price_incl_tax", $item->getData("price_incl_tax")]);
        $prices[] = $this->getBaseAttributeData(...["discount_amount", $item->getData("discount_amount")]);
        $prices[] = $this->getBaseAttributeData(...["discount_percent", $item->getData("discount_percent")]);
        $prices[] = $this->getBaseAttributeData(...["discount_tax_compensation_amount", $item->getData("discount_tax_compensation_amount")]);
        return $prices;
    }

    public function formatQuotePrices($quote)
    {
        $prices = null;
        $prices[] = $this->getBaseAttributeData(...["subtotal", $quote->getData("subtotal")]);
        $prices[] = $this->getBaseAttributeData(...["subtotal_with_discount", $quote->getData("subtotal_with_discount")]);
        $prices[] = $this->getBaseAttributeData(...["shipping_amount", $quote->getData("shipping_amount")]);
        $prices[] = $this->getBaseAttributeData(...["grand_total", $quote->getData("grand_total")]);
        return $prices;
    }

    public function getBaseAttributeData($key = "", $value = null, $type = "")
    {
        $baseAttributes = $this->baseAttributesFactory->create();
        $baseAttributes->setData(['key' => $key, "value" => $value, "type" => $type]);
        return $baseAttributes;
    }

    public function getDataAttributeData($id = null, $code = "", $value = null, $type = "", $label = "")
    {
        $dataAttributesInterface = $this->dataAttributesFactory->create();
        $dataAttributesInterface->setData(['id' => $id, 'code' => $code, "value" => $value, "type" => $type, "label" => $label]);
        return $dataAttributesInterface;
    }
}
