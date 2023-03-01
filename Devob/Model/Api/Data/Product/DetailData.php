<?php

namespace Tha\Devob\Model\Api\Data\Product;

use Tha\Devob\Api\Data\Product\DetailDataExtensionInterface;
use Tha\Devob\Api\Data\Product\DetailDataInterface;
use Tha\Devob\Model\Api\Data\Product\ItemList;

class DetailData extends ItemList implements DetailDataInterface
{
    function setTitle($value)
    {
        return $this->setData(self::TITLE, $value);
    }

    function getTitle($value)
    {
        return $this->getData(self::TITLE);
    }

    function setContent($value)
    {
        return $this->setData(self::CONTENT, $value);
    }

    function getContent()
    {
        return $this->getData(self::CONTENT);
    }

    function setInStock($value)
    {
        return $this->setData(self::IN_STOCK, $value);
    }

    function getInStock()
    {
        return $this->getData(self::IN_STOCK);
    }

    function setSaleOff($value)
    {
        return $this->setData(self::SALE_OFF, $value);
    }

    function getSaleOff()
    {
        return $this->getData(self::SALE_OFF);
    }

    function setTax($value)
    {
        return $this->setData(self::TAX, $value);
    }

    function getTax()
    {
        return $this->getData(self::TAX);
    }

    function setExMedia($value)
    {
        return $this->setData(self::EX_MEDIA, $value);
    }

    function getExMedia()
    {
        return $this->getData(self::EX_MEDIA);
    }

    function setMoreInformation($value)
    {
        return $this->setData(self::MORE_INFORMATION, $value);
    }

    function getMoreInformation()
    {
        return $this->getData(self::MORE_INFORMATION);
    }

    function setType($value)
    {
        return $this->setData(self::TYPE, $value);
    }

    function getType()
    {
        return $this->getData(self::TYPE);
    }

    public function setReviewContent($value)
    {
        return $this->setData(self::REVIEW_CONTENT, $value);
    }

    public function getReviewContent()
    {
        return $this->getData(self::REVIEW_CONTENT);
    }

    function setConfigData($value)
    {
        return $this->setData(self::CONFIG_DATA, $value);
    }

    function getConfigData()
    {
        return $this->getData(self::CONFIG_DATA);
    }

    function setBundData($value)
    {
        return $this->setData(self::BUND_DATA, $value);
    }

    function getBundData()
    {
        return $this->getData(self::BUND_DATA);
    }

    function setGroupData($value)
    {
        return $this->setData(self::GROUP_DATA, $value);
    }

    function getGroupData()
    {
        return $this->getData(self::GROUP_DATA);
    }

    function setExtensionAttributes(\Tha\Devob\Api\Data\Product\DetailDataExtensionInterface $value)
    {
        return $this->_setExtensionAttributes($value);
    }

    function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

}


?>
