<?php

namespace Tha\Devob\Api\Data\Product;

interface ProductDetailInterface extends \Magento\Framework\Api\ExtensibleDataInterface{
   const DETAIL_DATA = "detail_data";

   /**
    * @param \Tha\Devob\Api\Data\Product\DetailDataInterface $value
    * @return $this
    */
   public function setDetailData($value);

   /**
    * @return \Tha\Devob\Api\Data\Product\DetailDataInterface
    */
   public function getDetailData();
}
?>