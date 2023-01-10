<?php

namespace Tha\Devob\Helper\Api;

use Magento\Framework\App\Helper\AbstractHelper;
use Tha\Devob\Model\Api\Data\Category\CategoryDetailFactory;
use Tha\Devob\Model\Api\Data\Category\CategoryListFactory;

class CategoryHelper extends AbstractHelper
{
    protected $objectManagerInterface;
    protected $image_helper;
    protected $categoryManagement;

    protected $categoryDetailFactory;
    protected $categoryListFactory;

    public function __construct(
        \Magento\Framework\ObjectManagerInterface $objectManagerInterface,
        \Magento\Catalog\Helper\Image $image_helper,
        \Magento\Catalog\Model\CategoryManagement $categoryManagement,
        CategoryListFactory $categoryListFactory,
        CategoryDetailFactory $categoryDetailFactory
    )
    {
        $this->objectManagerInterface = $objectManagerInterface;
        $this->image_helper = $image_helper;
        $this->categoryManagement = $categoryManagement;
        $this->categoryListFactory = $categoryListFactory;
        $this->categoryDetailFactory = $categoryDetailFactory;
    }

    public function convertCategoryList($category)
    {
        $categoryListFactory =  $this->categoryListFactory->create();

        $categoryListFactory->setName($category->getName());
        $categoryListFactory->setCategoryId($category_id = $category->getId());
        $categoryListFactory->setChildrenCount($category->getChildrenCount());
        $categoryListFactory->setPosition($category->getPosition());
        $categoryListFactory->setParentId($category->getParentId());
        $categoryListFactory->setUrlPath($category->getPathId());
        $categoryListFactory->setActive($category->getIsActive());
        $categoryListFactory->setUpdated($category->getUpdatedAt());
        $categoryListFactory->setChildren($this->get_category_children($category_id));
        return $categoryListFactory;
    }

    /**
     * @return \Tha\Devob\Api\Data\Category\CategoryDetailInterface[]|null
     */
    public function get_category_children($category_id = null)
    {
        $list_children = $this->categoryManagement->getTree($category_id);
        $list_data = null;
        foreach ($list_children->getChildrenData() as $category) {
            $category_de = $this->categoryDetailFactory->create();
            $category_de->setName($category->getName());
            $category_de->setCategoryId($category->getId());
            $category_de->setChildrenCount($category->getChildrenCount());
            $category_de->setPosition($category->getPosition());
            $category_de->setParentId($category->getParentId());
            $category_de->setUrlPath($category->getPathId());
            $category_de->setActive($category->getIsActive());
            $category_de->setUpdated($category->getUpdatedAt());
            $list_data[] = $category_de;
        }
        return $list_data;
    }
}
