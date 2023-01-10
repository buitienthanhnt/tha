<?php

namespace Tha\Devob\Api\Data\Category;

interface CategoryListInterface extends \Tha\Devob\Api\Data\Category\CategoryDetailInterface{
    const CHILDREN = "children";

    /**
     * @param \Tha\Devob\Api\Data\Category\CategoryDetailInterface[] $value
     * @return $this
     */
    public function setChildren($value);

    /**
     * @return \Tha\Devob\Api\Data\Category\CategoryDetailInterface[]
     */
    public function getChildren();
}
?>