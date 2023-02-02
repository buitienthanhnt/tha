<?php
namespace Tha\Devob\Api\Data\Cart;

use Tha\Devob\Api\Data\BaseAttributesInterface;

interface CartDetailInterface extends BaseAttributesInterface{
    const ID = "id";
    const NAME = "name";
    const STORE_ID = "store_id";
    const MESSAGE = "message";
    const CUSTOMER_ID = "customer_id";
    const CREATE_AT = "create_at";
    const UPDATED_AT = "updated_at";
    const ITEM_COUNT = "item_count";
    const ITEM_QTY = "item_qty";
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
}
?>