<?php

namespace Tha\Devob\Api;

use Tha\Devob\Api\Data\Product\ProductDetailInterface;
use Tha\Devob\Api\Data\Product\ProductListInterface;

interface ProductInterface{

    /**
     * @return string
     */
    public function getList();


	/**
	 * GET for Post api
	 * @param integer $product_id
	 * @return string
	 */
    public function getDetail($product_id);

    /**
     * @param integer $id
     * @param string $value
     * @return mixed
     */
    public function getProductdata($id, $value);

    /**
     * @param integer $category_id
     * @return ProductListInterface
     */
    public function getProductList($category_id);

    /**
     * @param integer $product_id
     * @return ProductDetailInterface
     */
    public function getProductDetail($product_id);

    /**
     * @param integer $product_id
     * @return ProductListInterface
     */
    public function getProductRelated($product_id);

    /**
     * @param integer $product_id
     * @return ProductListInterface
     */
    public function productUpsell($product_id);
}
?>
