<?php

namespace Tha\Devob\Model\Api;

use Tha\Devob\Api\WishlistInterface;

class Wishlist implements WishlistInterface
{

    protected $wishlistModel;

    public function __construct(
        \Tha\Devob\Model\Api\Wishlist\WishlistModel $wishlistModel
    )
    {
        $this->wishlistModel = $wishlistModel;
    }

    public function all_items()
    {
        return $this->wishlistModel->get_wishlist_items();
    }
}

?>