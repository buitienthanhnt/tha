<?php

namespace Tha\Devob\Model\Api\Data\Order;

use Tha\Devob\Api\Data\Order\OrderItemInterface;
use Tha\Devob\Model\Api\Data\BaseAttributes;

class OrderItem extends BaseAttributes implements OrderItemInterface
{
    function setIncrementId($value)
    {
        return $this->setData(self::INCREMENT_ID, $value);
    }

    function getIncrementId()
    {
        return $this->getData(self::INCREMENT_ID);
    }

    function setDate($value)
    {
        return $this->setData(self::DATE, $value);
    }

    function getDate()
    {
        return $this->getData(self::DATE);
    }

    function setShipTo($value)
    {
        return $this->setData(self::SHIP_TO, $value);
    }

    function getShipTo()
    {
        return $this->getData(self::SHIP_TO);
    }

    function setOrderTotal($value)
    {
        return $this->setData(self::ORDER_TOTAL, $value);
    }

    function getOrderTotal()
    {
        return $this->getData(self::ORDER_TOTAL);
    }

    function setStatus($value)
    {
        return $this->setData(self::STATUS, $value);
    }

    function getStatus()
    {
        return $this->getData(self::STATUS);
    }

    function setQuoteId($value)
    {
        return $this->setData(self::QUOTE_ID, $value);
    }

    function getQuoteId()
    {
        return $this->getData(self::QUOTE_ID);
    }

    function setShippingDescription($value)
    {
        return $this->setData(self::SHIPPING_DESCRIPTION, $value);
    }

    function getShippingDescription()
    {
        return $this->getData(self::SHIPPING_DESCRIPTION);
    }

    function setStoreId($value)
    {
        return $this->setData(self::STORE_ID, $value);
    }

    function getStoreId()
    {
        return $this->getData(self::STORE_ID);
    }

    function setCustomerId($value)
    {
        return $this->setData(self::CUSTOMER_ID, $value);
    }

    function getCustomerId()
    {
        return $this->getData(self::CUSTOMER_ID);
    }

    function setGrandTotal($value)
    {
        return $this->setData(self::GRAND_TOTAL, $value);
    }

    function getGrandTotal()
    {
        return $this->getData(self::GRAND_TOTAL);
    }

    function setShippingAmount($value)
    {
        return $this->setData(self::SHIPPING_AMOUNT, $value);
    }

    function getShippingAmount()
    {
        return $this->getData(self::SHIPPING_AMOUNT);
    }

    function setSubtotal($value)
    {
        return $this->setData(self::SUBTOTAL, $value);
    }

    function getSubtotal()
    {
        return $this->getData(self::SUBTOTAL);
    }

    function setTaxAmount($value)
    {
        return $this->setData(self::TAX_AMOUNT, $value);
    }

    function getTaxAmount()
    {
        return $this->getData(self::TAX_AMOUNT);
    }

    function setWeight($value)
    {
        return $this->setData(self::WEIGHT, $value);
    }

    function getWeight()
    {
        return $this->getData(self::WEIGHT);
    }
}

?>