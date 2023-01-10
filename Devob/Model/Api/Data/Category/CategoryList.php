<?php

namespace Tha\Devob\Model\Api\Data\Category;

use Tha\Devob\Api\Data\Category\CategoryListInterface;
use Tha\Devob\Model\Api\Data\Category\CategoryDetail;

class CategoryList extends CategoryDetail implements CategoryListInterface
{
    function setChildren($value)
    {
        return $this->setData(self::CHILDREN, $value);
    }

    function getChildren()
    {
        return $this->getData(self::CHILDREN);
    }
}

?>