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
     * ex: http://magento243x.com/rest/V1/cart/addToCart?product=1178&super_attribute[144]=170&super_attribute[93]=60
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

    /**
     * remove cart item
     * method: DELETE
     * url: {{url}}/{{res}}/V1/cart/removeItem/[item_id]?_tha_sid={{_tha_sid}}
     * ex: http://zxc.com/magento2git/rest/V1/cart/removeItem/2
     * @param int $item_id
     * @return Tha\Devob\Api\Data\Cart\CartDetailInterface
     */
    public function removeItem($item_id);

    // updateItem
    /**
     * update cart item(attribute, qty)
     * method: PUT
     * url: {{url}}/{{res}}/V1/cart/updateItem/?_tha_sid={{_tha_sid}}
     * ex: http://magento243x.com/rest/V1/cart/updateItem?id=59&product=1178&super_attribute[144]=170&super_attribute[93]=60
     * @return Tha\Devob\Api\Data\Cart\CartDetailInterface
     */
    public function updateItem();

}

?>