<?php
namespace Tha\Devob\Api\Data\Cart;

use Tha\Devob\Api\Data\BaseAttributesInterface;

interface CartDetailInterface extends BaseAttributesInterface{
    const ID = "id";
    const NAME = "name";
    const STORE_ID = "store_id";
    const MESSAGE = "message";
    const CUSTOMER_ID = "customer_id";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";
    const ITEM_COUNT = "item_count";
    const ITEM_QTY = "item_qty";
    const CART_APPLY_RULES = "cart_apply_rules";
    const QUOTE_CURRENCY_CODE = "quote_currency_code";
    const GLOBAL_CURRENCY_CODE = "global_currency_code";
    const ITEMS = "items";
    const TOTALS = "totals";
    const PRICES = "prices";

    /**
     * @param integer $value
     * @return $this
     */
    public function setId($value);

    /**
     * @return integer
     */
    public function getId();

    /**
     * @param string $value
     * @return $this
     */
    public function setName($value);

    /**
     * @return string
     */
    public function getName();

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
     * @value mixed
     * @return $this
     */
    public function setMessage($value);

    /**
     * @return mixed
     */
    public function getMessage();

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
    public function setCreatedAt($value);

    /**
     * @return string
     */
    public function getCreatedAt();

       /**
     * @param string $value
     * @return $this
     */
    public function setUpdatedAt($value);

    /**
     * @return string
     */
    public function getUpdatedAt();

    /**
     * @param integer $value
     * @return $this
     */
    public function setItemCount($value);

    /**
     * @return integer
     */
    public function getItemCount();

    /**
     * @param integer $value
     * @return $this
     */
    public function setItemQty($value);
    
    /**
     * @return integer
     */
    public function getItemQty();

    /**
     * @param string $value
     * @return $this
     */
    public function setCartApplyRules($value);
    
    /**
     * @return string
     */
    public function getCartApplyRules();

    // QUOTE_CURRENCY_CODE
    /**
     * @param string $value
     * @return $this
     */
    public function setQuoteCurrencyCode($value);

    /**
     * @return string
     */
    public function getQuoteCurrencyCode();

    // GLOBAL_CURRENCY_CODE
    /**
     * @param string $value
     * @return $this
     */
    public function setGlabalCurrencyCode($value);

    /**
     * @return string
     */
    public function getGlabalCurrencyCode();

    /**
     * @param Tha\Devob\Api\Data\CartItemInterface[] $value
     * @return $this
     */
    public function setItems($value);
    
    /**
     * @return Tha\Devob\Api\Data\Cart\CartItemInterface[]
     */
    public function getItems();

    /**
     * @param Tha\Devob\Api\Data\Cart\BaseAttributesInterface[] $value
     * @return $this
     */
    public function setTotals($value);
    
    /**
     * @return Tha\Devob\Api\Data\BaseAttributesInterface[]
     */
    public function getTotals();
    
    /**
     * @param Tha\Devob\Api\Data\BaseAttributesInterface[] $value
     * @return $this
     */
    public function setPrices($value);
    
    /**
     * @return Tha\Devob\Api\Data\BaseAttributesInterface[]
     */
    public function getPrices();
    
}
?>