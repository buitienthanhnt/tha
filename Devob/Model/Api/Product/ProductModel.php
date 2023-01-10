<?php

namespace Tha\Devob\Model\Api\Product;

class ProductModel
{
    protected $request;
    protected $categoryRepository;
    protected $product_collection;
    protected $product_helper;

    public function __construct(
        \Magento\Framework\App\Request\Http $request,
        \Magento\Catalog\Model\CategoryRepository $categoryRepository,
        \Magento\Catalog\Model\ResourceModel\Product\Collection $product_collection,
        \Tha\Devob\Helper\Api\ProductHelp $product_helper
    )
    {
        $this->request = $request;
        $this->categoryRepository = $categoryRepository;
        $this->product_collection = $product_collection;
        $this->product_helper = $product_helper;
    }

    public function getProductList($category_id)
    {
        if ($category_id && $category = $this->categoryRepository->get($category_id, $this->request->getParam("__store_id"))) {
            $product_data = $this->product_collection->addCategoryFilter($category)->setPage($this->request->getParam("_p") ?: 1, $this->request->getParam("p_size") ?: 6);
            return $this->product_helper->convertProductList($product_data, $category_id);
        }
    }

    public function getProductDetail($product_id)
    {
        if ($product_id) {
            return $this->product_helper->convertProductDetail($product_id);
        }
    }

    public function getProductRelated($product_id)
    {
        if ($product_id) {
            return $this->product_helper->getProductRelated($product_id);
        }else {
            return null;
        }
    }

    public function productUpsell($product_id)
    {
        if ($product_id) {
            return $this->product_helper->productUpsell($product_id);
        }else {
            return null;
        }
    }
    
}

?>