<?php

namespace Tha\Devob\Api\Data\Product;

interface ItemListInterface{
    const E_ID = "e_id";
    const NAME = "name";
    const SKU = "sku";
    const PRODUCT_URL = "product_url";
    const IMAGE_PATH = "image_path";
    const PRICE = "price";
    const ACTIVE = "active";
    const SALEABLE = "saleable";
    const RATES = "rates";
    const REVIEWS = "reviews";
    const MIN_PRICE = "min_price";
    const QTY = "qty";
    const DEFAULT_QTY = "default_qty";

    /**
     * @param integer $value
     * @return $this
     */
    public function setEid($value);

    /**
     * @return integer
     */
    public function getEid();

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
    public function setSku($value);

    /**
     * @return string
     */
    public function getSku();

    /**
     * @param string $value
     * @return $this
     */
    public function setProductUrl($value);

    /**
     * @return string
     */
    public function getProductUrl();

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
     * @param string $value
     * @return $this
     */
    public function setPrice($value);
    
    /**
     * @return string
     */
    public function getPrice();
    
    /**
     * @param bool
     * @return $this
     */
    public function setActive($value);
    
    /**
     * @return bool
     */
    public function getActive();
    
    /**
     * @param bool
     * @return $this
     */
    public function setSaleable($value);
    
    /**
     * @return bool
     */
    public function getSaleable();

    /**
     * @param integer $value
     * @return $this
     */
    public function setRates($value);
    
    /**
     * @return integer
     */
    public function getRates();

    /**
     * @param integer $value
     * @return $this
     */
    public function setReviews($value);
    
    /**
     * @return integer
     */
    public function getReviews();

    /**
     * @param string
     * @return $this
     */
    public function setMinPrice($value);
    
    /**
     * @return string
     */
    public function getMinPrice();

    /**
     * @param integer $value
     * @return $this
     */
    public function setQty($value);

    /**
     * @return integer
     */
    public function getQty();

        /**
     * @param integer $value
     * @return $this
     */
    public function setDefaultQty($value);

    /**
     * @return integer
     */
    public function getDefaultQty();
    
    
}
?>