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
     * get product list by category
     * method: GET
     * url: {{url}}/{{res}}/V1/productList/[]?_p=[]&p_size=[]&_tha_sid={{_tha_sid}}
     * ex: http://magento242.com/rest/V1/productList/4?_p=1&p_size=6&_tha_sid=ml2a2d8pavsehlui9h5hoaisb6
     * @param integer $category_id
     * @return ProductListInterface
     */
    public function getProductList($category_id);

    /**
     * get product detail by id
     * method: GET
     * url: {{url}}/{{res}}/V1/productDetail/[]?_tha_sid={{_tha_sid}}
     * ex: http://magento242.com/rest/V1/productDetail/6?_tha_sid=ml2a2d8pavsehlui9h5hoaisb6
     * @param integer $product_id
     * @return ProductDetailInterface
     */
    public function getProductDetail($product_id);

    /**
     * get related product of product
     * method: GET
     * url: {{url}}/{{res}}/V1/productRelated/[]?_tha_sid={{_tha_sid}}
     * ex: http://magento242.com/rest/V1/productRelated/6?_tha_sid=ml2a2d8pavsehlui9h5hoaisb6
     * @param integer $product_id
     * @return ProductListInterface
     */
    public function getProductRelated($product_id);

    /**
     * get Upsell products of product
     * method: GET
     * url: {{url}}/{{res}}/V1/productUpsell/[]?_tha_sid={{_tha_sid}}
     * ex: http://magento242.com/rest/V1/productUpsell/6?_tha_sid=ml2a2d8pavsehlui9h5hoaisb6
     * @param integer $product_id
     * @return ProductListInterface
     */
    public function productUpsell($product_id);
}
?>
