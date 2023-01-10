<?php
namespace Tha\Devob\Model\Api;

use Magento\Framework\App\Request\Http;
use Tha\Devob\Api\ProductInterface;

class Product implements ProductInterface
{
    protected $request;
    protected $productModel;

    public function __construct(
        Http $request,
        \Tha\Devob\Model\Api\Product\ProductModel $productModel
    )
    {
        $this->request = $request;
        $this->productModel = $productModel;
    }

    public function getList()
    {
        return "123";
    }

    /**
	 * {@inheritdoc}
	 */
    public function getDetail($product_id)
    {
        return $product_id;
    }

    /**
     * @inheritdoc
     */
    public function getProductdata($id, $value)
    {
        # code...
        // return $this->request->getParams();
        return ["asd", "ppp", $id, $value];
    }

    /**
     * @inheritdoc
     */
    public function getProductList($category_id)
    {
        return $this->productModel->getProductList($category_id);
    }

    /**
     * @inheritdoc
     */
    public function getProductDetail($product_id)
    {
        return $this->productModel->getProductDetail($product_id);
    }

    public function getProductRelated($product_id)
    {
        return $this->productModel->getProductRelated($product_id);
    }

    public function productUpsell($product_id)
    {
        return $this->productModel->productUpsell($product_id);
    }
}

?>