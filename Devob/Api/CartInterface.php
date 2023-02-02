<?php

namespace Tha\Devob\Api;

interface CartInterface{
    /**
     * get cart detail by cart_id
     * method: GET
     * url: {{url}}/{{res}}/V1/cart/detail?_tha_sid={{_tha_sid}}
     * ex: http://zxc.com/magento2git/rest/V1/cart/detail/1 thông thường sẽ getCart bằng sesion.
     * @param int $cart_id
     * @return Tha\Devob\Api\Data\Cart\CartDetailInterface
     */
    public function getCartDetail($cart_id);


    /**
     * get cart detail of session
     * method: GET
     * url: {{url}}/{{res}}/V1/cart/data?_tha_sid={{_tha_sid}}
     * ex: http://zxc.com/magento2git/rest/V1/cart/data thông thường sẽ getCart bằng sesion.
     * @return Tha\Devob\Api\Data\Cart\CartDetailInterface
     */
    public function getCartData();

     /**
     * add product to cart
     * method: POST
     * url: {{url}}/{{res}}/V1/cart/addToCart?_tha_sid={{_tha_sid}}
     * ex: http://zxc.com/magento2git/rest/V1/cart/addToCart
     * @return Tha\Devob\Api\Data\Cart\CartDetailInterface
     */
    public function addToCart();
}

?>