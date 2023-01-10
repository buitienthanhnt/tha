<?php

namespace Tha\Devob\Api\Data\Product;

interface DetailDataInterface extends ItemListInterface{
   const TITLE = "title";
   const CONTENT = "content";
   const IN_STOCK = "in_stock";
   const SALE_OFF = "sale_off";
   const TAX = "tax";
   const EX_MEDIA = "ex_media";
   const MORE_INFORMATION = "more_information";
   const TYPE = "type";
   const REVIEW_CONTENT = "review_content";
   const CONFIG_DATA = "config_data";
   const BUND_DATA = "bun_data";
   const GROUP_DATA = "group_data";

   /**
    * @param string $value
    * @return $this
    */
   public function setTitle($value);

   /**
    * @return string
    */
   public function getTitle($value);

   /**
    * @param string $value
    * @return $this
    */
   public function setContent($value);

   /**
    * @return string
    */
   public function getContent();

   /**
    * @param bool
    * @return $this
    */
   public function setInStock($value);

   /**
    * @return bool
    */
   public function getInStock();

   /**
    * @param float
    * @return $this
    */
   public function setSaleOff($value);

   /**
    * @return float
    */
   public function getSaleOff();

   /**
    * @param float $value
    * @return $this
    */
   public function setTax($value);

   /**
    * @return float
    */
   public function getTax();

   /**
    * @param mixed $value
    * @return $this
    */
   public function setExMedia($value);

   /**
    * @return mixed
    */
   public function getExMedia();

   /**
    * @param mixed $value
    * @return $this
    */
   public function setMoreInformation($value);

   /**
    * @return \Tha\Devob\Api\Data\DataAttributesInterface__
    */
   public function getMoreInformation();

   /**
    * @param string $value
    * @return $this
    */
   public function setType($value);

   /**
    * @return string
    */
   public function getType();

    /**
     * @param mixed $value
     * @return $this
     */
    public function setReviewContent($value);

    /**
     * @return \Tha\Devob\Api\Data\DataAttributesInterface__
     */
    public function getReviewContent();

   /**
    * @param \Tha\Devob\Api\Data\Product\Config\ConfigDataInterface|null $value
    * @return $this
    */
   public function setConfigData($value);

   /**
    * @return \Tha\Devob\Api\Data\Product\Config\ConfigDataInterface|null
    */
   public function getConfigData();

   /**
    * @param \Tha\Devob\Api\Data\Product\Bunder\BunderDataInterface[]|null $value
    * @return $this
    */
   public function setBundData($value);

   /**
    * @return \Tha\Devob\Api\Data\Product\Bunder\BunderDataInterface[]|null
    */
   public function getBundData();

   /**
    * @param \Tha\Devob\Api\Data\Product\ItemListInterface[]|null $value
    * @return $this
    */
   public function setGroupData($value);

   /**
    * @return \Tha\Devob\Api\Data\Product\ItemListInterface[]|null
    */
   public function getGroupData();
}

?>
