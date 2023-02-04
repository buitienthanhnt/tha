<?php
namespace Tha\Devob\Model\Api;

use Tha\Devob\Api\CartInterface;

class Cart implements CartInterface
{

    protected $cartModel;

    public function __construct(
        \Tha\Devob\Model\Api\Cart\CartModel $cartModel
    )
    {
        $this->cartModel = $cartModel;
    }

    public function getCartDetail($cart_id)
    {
        if ($cart_id && $cart_id > 0) {
            return $this->cartModel->getCartDetail($cart_id);
        }else {
            \Magento\Framework\Exception\InputException::invalidFieldValue("cart_id", (string) $cart_id);
        }
    }

    public function getCartData()
    {
        return $this->cartModel->getCartData();
    }

    public function addToCart()
    {
        return $this->cartModel->addToCart();
    }

    public function updateQty()
    {
        return $this->cartModel->updateQty();
    }

    public function emptyCart()
    {
        return $this->cartModel->emptyCart();
    }
}
