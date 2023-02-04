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
     * ex: http://magento243x.com/rest/V1/cart/addToCart?product=8&qty=2&_tha_sid=9sfg17dtrrgrqbb3s31kup0gp4
     * @return Tha\Devob\Api\Data\Cart\CartDetailInterface
     */
    public function addToCart();

     /**
     * update cart item qty
     * method: UPDATE qty
     * url: {{url}}/{{res}}/V1/cart/updateQty?_tha_sid={{_tha_sid}}
     * ex: http://magento243x.com/rest/V1/cart/updateQty?_tha_sid=9sfg17dtrrgrqbb3s31kup0gp4&item_id=11&qty=3
     * @return Tha\Devob\Api\Data\Cart\CartDetailInterface
     */
    public function updateQty();

    /**
     * empty cart
     * method: DELETE
     * url: {{url}}/{{res}}/V1/cart/emptyCart?_tha_sid={{_tha_sid}}
     * ex: http://zxc.com/magento2git/rest/V1/cart/emptyCart
     * @return Tha\Devob\Api\Data\Cart\CartDetailInterface
     */
    public function emptyCart();

}

?>