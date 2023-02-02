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
}
