<?php

namespace Tha\Devob\Model\Api\Category;

use Magento\Catalog\Model\CategoryManagement;
use Magento\Catalog\Model\CategoryRepository;
use Magento\Framework\App\Request\Http;
use Tha\Devob\Helper\Api\CategoryHelper;

class CategoryModel
{
    protected $request;
    protected $categoryRepository;
    protected $category_tree;
    protected $categoryManagement;
    protected $categoryHelper;

    public function __construct(
        Http $request,
        CategoryRepository $categoryRepository,
        \Magento\Catalog\Model\Category\Tree $category_tree,
        CategoryManagement $categoryManagement,
        CategoryHelper $categoryHelper
    )
    {
        $this->request = $request;
        $this->categoryRepository = $categoryRepository;
        $this->category_tree = $category_tree;
        $this->categoryManagement = $categoryManagement;
        $this->categoryHelper = $categoryHelper;
    }

    public function getCategoryList()
    {
        $data = null;
        $category_id = $this->request->getParam("category_id");
        if ($category_id) {
            $category = $this->categoryRepository->get($category_id);
            $data = $category;
        }else {
            $category = $this->category_tree->getRootNode();
            $data = $category;
        }
        return $this->categoryHelper->convertCategoryList($data);
    }
}

?>