<?php

namespace Tha\Devob\Model\Api\Data\Product;

use Magento\Framework\Model\AbstractExtensibleModel;
use Tha\Devob\Api\Data\Product\ItemListInterface;

class ItemList extends AbstractExtensibleModel implements ItemListInterface
{
    /**
     * @inheritdoc
     */
    function setEid($value)
    {
        return $this->setData(self::E_ID, $value);
    }

    /**
     * @inheritdoc
     */
    function getEid()
    {
        return $this->getData(self::E_ID);
    }

    /**
     * @inheritdoc
     */
    function setName($value)
    {
        return $this->setData(self::NAME, $value);
    }

    /**
     * @inheritdoc
     */
    function getName()
    {
        return $this->getData(self::NAME);
    }

    function setSku($value)
    {
        return $this->setData(self::SKU, $value);
    }

    function getSku()
    {
        return $this->getData(self::SKU);
    }

    /**
     * @inheritdoc
     */
    function setProductUrl($value)
    {
        return $this->setData(self::PRODUCT_URL, $value);
    }

    /**
     * @inheritdoc
     */
    function getProductUrl()
    {
        return $this->getData(self::PRODUCT_URL);
    }

    /**
     * @inheritdoc
     */
    function setImagePath($value)
    {
        return $this->setData(self::IMAGE_PATH, $value);
    }

    /**
     * @inheritdoc
     */
    function getImagePath()
    {
        return $this->getData(self::IMAGE_PATH);
    }

    function setPrice($value)
    {
        return $this->setData(self::PRICE, $value);
    }

    function getPrice()
    {
        return $this->getData(self::PRICE);
    }

    function setActive($value)
    {
        return $this->setData(self::ACTIVE, $value);
    }

    function getActive()
    {
        return $this->getData(self::ACTIVE);
    }

    function setSaleable($value)
    {
        return $this->setData(self::SALEABLE, $value);
    }

    function getSaleable()
    {
        return $this->getData(self::SALEABLE);
    }

    function setRates($value)
    {
        return $this->setData(self::RATES, $value);
    }

    function getRates()
    {
        return $this->getData(self::RATES);
    }

    function setReviews($value)
    {
        return $this->setData(self::REVIEWS, $value);
    }

    function getReviews()
    {
        return $this->getData(self::REVIEWS);
    }

    function setMinPrice($value)
    {
        return $this->setData(self::MIN_PRICE, $value);
    }

    function getMinPrice()
    {
        return $this->getData(self::MIN_PRICE);
    }

    function setQty($value)
    {
        return $this->setData(self::QTY, $value);
    }

    function getQty()
    {
        return $this->getData(self::QTY);
    }

    function setDefaultQty($value)
    {
        return $this->setData(self::DEFAULT_QTY, $value ?? 1);
    }

    function getDefaultQty()
    {
        return $this->getData(self::DEFAULT_QTY) ?? 1;
    }
}


?>