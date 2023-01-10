<?php
namespace Tha\Devob\Model\Api\Data\Category;

use Magento\Framework\Model\AbstractExtensibleModel;
use Tha\Devob\Api\Data\Category\CategoryDetailInterface;

class CategoryDetail extends AbstractExtensibleModel implements CategoryDetailInterface
{
    function setName($value)
    {
        return $this->setData(self::NAME, $value);
    }

    function getName()
    {
        return $this->getData(self::NAME);
    }

    function setCategoryId($value)
    {
        return $this->setData(self::CATEGORY_ID, $value);
    }

    function getCategoryId()
    {
        return $this->getData(self::CATEGORY_ID);
    }

    function setParentId($value)
    {
        return $this->setData(self::PARENT_ID, $value);
    }

    public function getParentId()
    {
        return $this->getData(self::PARENT_ID);
    }

    function setActive($value)
    {
        return $this->setData(self::ACTIVE, $value);
    }

    function getActive()
    {
        return $this->getData(self::ACTIVE);
    }

    function setPosition($value)
    {
        return $this->setData(self::POSITION, $value);
    }

    function getPosition()
    {
        return $this->getData(self::POSITION);
    }

    function setUpdated($value)
    {
        return $this->setData(self::UPDATED, $value);
    }

    function getUpdated()
    {
        return $this->getData(self::UPDATED);
    }

    function setUrlPath($value)
    {
        return $this->setData(self::URL_PATH, $value);
    }

    function getUrlPath()
    {
        return $this->getData(self::URL_PATH);
    }

    function setChildrenCount($value)
    {
        return $this->setData(self::CHILDREN_COUNT, $value);
    }

    function getChildrenCount()
    {
        return $this->getData(self::CHILDREN_COUNT);
    }
}

?>