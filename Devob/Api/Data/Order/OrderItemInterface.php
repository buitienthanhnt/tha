<?php

namespace Tha\Devob\Api\Data\Order;

use Tha\Devob\Api\Data\BaseAttributesInterface;

interface OrderItemInterface extends BaseAttributesInterface{
    const INCREMENT_ID = "increment_id";
    const DATE = "date";
    const SHIP_TO = "ship_to";
    const ORDER_TOTAL = "order_total";
    const STATUS = "status";
    const QUOTE_ID = "quote_id";
    const SHIPPING_DESCRIPTION = "shipping_description";
    const STORE_ID = "store_id";
    const CUSTOMER_ID = "customer_id";
    const GRAND_TOTAL = "grand_total";
    const SHIPPING_AMOUNT = "shipping_amount";
    const SUBTOTAL = "subtotal";
    const TAX_AMOUNT = "tax_amount";
    const WEIGHT = "weight";

    /**
     * @param string $value
     * @return $this
     */
    public function setIncrementId($value);

    /**
     * @return string
     */
    public function getIncrementId();

    /**
     * @param string $value
     * @return $this
     */
    public function setDate($value);

    /**
     * @return string
     */
    public function getDate();

    /**
     * @param string $value
     * @return $this
     */
    public function setShipTo($value);

    /**
     * @return string
     */
    public function getShipTo();

    /**
     * @param string $value
     * @return $this
     */
    public function setOrderTotal($value);

    /**
     * @return string
     */
    public function getOrderTotal();

    /**
     * @param string $value
     * @return $this
     */
    public function setStatus($value);

    /**
     * @return string
     */
    public function getStatus();

    /**
     * @param integer $value
     * @return $this
     */
    public function setQuoteId($value);

    /**
     * @return integer
     */
    public function getQuoteId();

    /**
     * @param string $value
     * @return $this
     */
    public function setShippingDescription($value);

    /**
     * @return string
     */
    public function getShippingDescription();

    /**
     * @param integer $value
     * @return $this
     */
    public function setStoreId($value);

    /**
     * @return integer
     */
    public function getStoreId();

    /**
     * @param integer $value
     * @return $this
     */
    public function setCustomerId($value);

    /**
     * @return integer
     */
    public function getCustomerId();

    /**
     * @param string $value
     * @return $this
     */
    public function setGrandTotal($value);

    /**
     * @return string
     */
    public function getGrandTotal();

    /**
     * @param string $value
     * @return $this
     */
    public function setShippingAmount($value);

    /**
     * @return string
     */
    public function getShippingAmount();

    /**
     * @param string $value
     * @return $this
     */
    public function setSubtotal($value);

    /**
     * @return string
     */
    public function getSubtotal();

    /**
     * @param string $value
     * @return $this
     */
    public function setTaxAmount($value);

    /**
     * @return string
     */
    public function getTaxAmount();

    /**
     * @param string $value
     * @return $this
     */
    public function setWeight($value);

    /**
     * @return string
     */
    public function getWeight();
}

?>