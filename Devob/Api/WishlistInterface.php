<?php

namespace Tha\Devob\Api;

interface  WishlistInterface{
    /**
     * get wishlist item of customer
     * url: {{url}}/{{res}}/V1/wishlist/all_items?_tha_sid={{_tha_sid}}
     * ex: http://zxc.com/magento2git/rest/V1/wishlist/all_items?_tha_sid=4ofi7tb99dhf415s3rooqvlm5b
     * @return \Tha\Devob\Api\Data\Wishlist\WishlistItemInterface
     */
    public function all_items();
}
?>