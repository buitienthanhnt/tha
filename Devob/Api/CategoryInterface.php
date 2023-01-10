<?php

namespace Tha\Devob\Api;

interface CategoryInterface{
    /**
     * @param integer $cate_id
     * @return mixed
     */
    public function getCategoryData($cate_id);

    /**
     * @param integer $cate_id
     * @return string
     */
    public function getCategoryValue($cate_id);

    /**
     * @return mixed
     */
    public function getCategoryTree();

    /**
     * @return \Tha\Devob\Api\Data\Category\CategoryListInterface
     */
    public function getCategoryList();
}

?>