<?php

namespace Tha\Devob\Model\Api\Data\Cart;

use Tha\Devob\Api\Data\Cart\CartDetailInterface;
use Tha\Devob\Model\Api\Data\BaseAttributes;

class CartDetail extends BaseAttributes implements CartDetailInterface
{
    public function setId($value)
    {
        return $this->setData(self::ID, $value);
    }

    public function getId()
    {
        return $this->getData(self::ID);
    }

    public function setName($value)
    {
        return $this->setData(self::NAME, $value);
    }

    public function getName()
    {
        return $this->getData(self::NAME);
    }

    public function setStoreId($value)
    {
        return $this->setData(self::STORE_ID, $value);
    }

    public function getStoreId()
    {
        return $this->getData(self::STORE_ID);
    }

    public function setMessage($value)
    {
        return $this->setData(self::MESSAGE, $value);
    }

    public function getMessage()
    {
        return $this->getData(self::MESSAGE);
    }

    public function setCustomerId($value)
    {
        return $this->setData(self::CUSTOMER_ID, $value);
    }

    public function getCustomerId()
    {
        return $this->getData(self::CUSTOMER_ID);
    }

    public function setCreatedAt($value)
    {
        return $this->setData(self::CREATED_AT, $value);
    }

    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    public function setUpdatedAt($value)
    {
        return $this->setData(self::UPDATED_AT, $value);
    }

    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }

    public function setItemCount($value)
    {
        return $this->setData(self::ITEM_COUNT, $value);
    }

    public function getItemCount()
    {
        return $this->getData(self::ITEM_COUNT);
    }

    public function setItemQty($value)
    {
        return $this->setData(self::ITEM_QTY, $value);
    }

    public function getItemQty()
    {
        return $this->getData(self::ITEM_QTY);
    }

    public function setCartApplyRules($value)
    {
        return $this->setData(self::CART_APPLY_RULES, $value);
    }

    public function getCartApplyRules()
    {
        return $this->getData(self::CART_APPLY_RULES);
    }

    public function setQuoteCurrencyCode($value)
    {
        return $this->setData(self::QUOTE_CURRENCY_CODE, $value);
    }

    public function getQuoteCurrencyCode()
    {
        return $this->getData(self::QUOTE_CURRENCY_CODE);
    }

    public function setGlabalCurrencyCode($value)
    {
        return $this->setData(self::GLOBAL_CURRENCY_CODE, $value);
    }

    public function getGlabalCurrencyCode()
    {
        return $this->getData(self::GLOBAL_CURRENCY_CODE);
    }

    public function setItems($value)
    {
        return $this->setData(self::ITEMS, $value);
    }

    public function getItems()
    {
        return $this->getData(self::ITEMS);
    }

    public function setTotals($value)
    {
        return $this->setData(self::TOTALS, $value);
    }

    public function getTotals()
    {
        return $this->getData(self::TOTALS);
    }

    public function setPrices($value)
    {
        return $this->setData(self::PRICES, $value);
    }

    public function getPrices()
    {
        return $this->getData(self::PRICES);
    }


}

?>