<?php

namespace Tha\Devob\Api;

interface CartInterface{
    /**
     * get cart detail of session
     * method: GET
     * url: {{url}}/{{res}}/V1/cart/detail?_tha_sid={{_tha_sid}}
     * ex: 
     * @return Tha\Devob\Api\Data\Cart\CartDetailInterface
     */
    public function getCartDetail();
}

?>