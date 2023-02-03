<?php
namespace Tha\Devob\Model\Api\Data\Cart;

use Tha\Devob\Api\Data\Cart\CartItemInterface;
use Tha\Devob\Model\Api\Data\BaseAttributes;

class CartItem extends BaseAttributes implements CartItemInterface
{
    public function setId($value)
    {
        return $this->setData(self::ID, $value);
    }

    public function getId()
    {
        return $this->getData(self::ID);
    }

    public function setName($value)
    {
        return $this->setData(self::NAME, $value);
    }

    public function setItemUrl($value)
    {
        return $this->setData(self::ITEM_URL, $value);
    }

    public function getItemUrl()
    {
        return $this->getData(self::ITEM_URL);
    }

    public function setImagePath($value)
    {
        return $this->setData(self::IMAGE_PATH, $value);
    }

    public function getImagePath()
    {
        return $this->getData(self::IMAGE_PATH);
    }

    public function getName()
    {
        return $this->getData(self::NAME);
    }

    public function setStoreId($value)
    {
        return $this->setData(self::STORE_ID, $value);
    }

    public function getStoreId()
    {
        return $this->getData(self::STORE_ID);
    }

    public function setCreatedAt($value)
    {
        return $this->setData(self::CREATED_AT, $value);
    }

    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    public function setUpdatedAt($value)
    {
        return $this->setData(self::UPDATED_AT, $value);
    }

    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }

    public function setItemQty($value)
    {
        return $this->setData(self::ITEM_QTY, $value);
    }

    public function getItemQty()
    {
        return $this->getData(self::ITEM_QTY);
    }

    public function setPrices($value)
    {
        return $this->setData(self::PRICES, $value);
    }

    public function getPrices()
    {
        return $this->getData(self::PRICES);
    }

    public function setRequestOption($value)
    {
        return $this->setData(self::REQUEST_OPTION, $value);
    }

    public function getRequestOption()
    {
        $this->getData(self::REQUEST_OPTION);
    }

    public function setRequestOptionHtml($value)
    {
        return $this->setData(self::REQUEST_OPTION_HTML, $value);
    }

    public function getRequestOptionHtml()
    {
        return $this->getData(self::REQUEST_OPTION_HTML);
    }
}
