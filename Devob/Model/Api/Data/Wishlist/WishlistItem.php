<?php

namespace Tha\Devob\Model\Api\Data\Wishlist;

use Tha\Devob\Api\Data\Wishlist\WishlistItemInterface as WishlistWishlistItemInterface;
use Tha\Devob\Model\Api\Data\BaseAttributes;

class WishlistItem extends BaseAttributes implements WishlistWishlistItemInterface
{
    public function setItems($values)
    {
        return $this->setData(self::ITEMS, $values);
    }

    function getItems()
    {
        return $this->getData(self::ITEMS);
    }
}

?>