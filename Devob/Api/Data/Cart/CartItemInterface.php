<?php
namespace Tha\Devob\Api\Data\Cart;

use Tha\Devob\Api\Data\MidAttributeInterface;

interface CartItemInterface extends MidAttributeInterface{
    const ID = "id";
    const NAME = "name";
    const ITEM_URL = "item_url";
    const IMAGE_PATH = "image_path";
    const QUOTE_ID = "quote_id";
    const STORE_ID = "store_id";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";
    const ITEM_QTY = "item_qty";
    const PRICES = "prices";
    const REQUEST_OPTION = "request_option";
    const REQUEST_OPTION_HTML = "request_option_html";
    const PRODUCT = "product";
    const APPLY_RULE_IDS = "apply_rule_ids";

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
     * @param string $value
     * @return $this
     */
    public function setItemUrl($value);
    
    /**
     * @return string
     */
    public function getItemUrl();
    
    /**
     * @param string $value
     * @return $this
     */
    public function setImagePath($value);
    
    /**
     * @return string
     */
    public function getImagePath();

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
     * @param integer $value
     * @return $this
     */
    public function setStoreId($value);

    /**
     * @return integer
     */
    public function getStoreId();

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
    public function setItemQty($value);
    
    /**
     * @return integer
     */
    public function getItemQty();

    /**
     * @param Tha\Devob\Api\Data\BaseAttributesInterface[] $value
     * @return $this
     */
    public function setPrices($value);
    
    /**
     * @return Tha\Devob\Api\Data\BaseAttributesInterface[]
     */
    public function getPrices();

    /**
     * @param Tha\Devob\Api\Data\BaseAttributesInterface[] $value
     * @return $this
     */
    public function setRequestOption($value);
    
    /**
     * @return Tha\Devob\Api\Data\BaseAttributesInterface[]
     */
    public function getRequestOption();

    /**
     * @param Tha\Devob\Api\Data\BaseAttributesInterface[] $value
     * @return $this
     */
    public function setRequestOptionHtml($value);

    /**
     * @return Tha\Devob\Api\Data\BaseAttributesInterface[]
     */
    public function getRequestOptionHtml();

    /**
     * @param string $value
     * @return $this
     */
    public function setApplyRuleIds($value);
    
    /**
     * @return string
     */
    public function getApplyRuleIds();


}
?>