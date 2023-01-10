<?php

namespace Tha\Devob\Model\Api;

use Tha\Devob\Api\CategoryInterface;
use Tha\Devob\Model\Api\Category\CategoryModel;
use Tha\Devob\Helper\Api\Data;

class Category implements CategoryInterface
{
    protected $categoryModel;
    protected $helper_data;

    public function __construct(
        Data $helper_data,
        CategoryModel $categoryModel
    )
    {
        $this->helper_data = $helper_data;
        $this->categoryModel = $categoryModel;
    }

    /**
     * {@inheritdoc}
     */
    public function getCategoryData($cate_id)
    {
        return [
            "name" => "detail category data",
            "id" => 123
        ];
    }

    /**
     * @inheritdoc
     */
    public function getCategoryValue($cate_id)
    {
        # code...
        return $cate_id;
    }

    /**
     * @inheritdoc
     */
    public function getCategoryTree()
    {
        return [
            123, 123, 333, 555
        ];
    }

    public function getCategoryList()
    {
        return $this->categoryModel->getCategoryList();
    }
}

?>