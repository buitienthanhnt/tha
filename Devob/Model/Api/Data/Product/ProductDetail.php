<?php

namespace Tha\Devob\Model\Api\Data\Product;

use Magento\Framework\Model\AbstractExtensibleModel;
use Tha\Devob\Api\Data\Product\ProductDetailInterface;

class ProductDetail extends AbstractExtensibleModel implements ProductDetailInterface
{
    function setDetailData($value)
    {
        return $this->setData(self::DETAIL_DATA, $value);
    }

    function getDetailData()
    {
        return $this->getData(self::DETAIL_DATA);
    }
}

?>