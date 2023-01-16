<?php

namespace Tha\Devob\Api\Data\Wishlist;

use Tha\Devob\Api\Data\BaseAttributesInterface;

interface WishlistItemInterface extends BaseAttributesInterface{
    const ITEMS = "items";

    /**
     * @param \Tha\Devob\Api\Data\Product\ItemListInterface[] $value
     * @return $this
     */
    public function setItems($values);

    /**
     * @return \Tha\Devob\Api\Data\Product\ItemListInterface[]|null
     */
    public function getItems();
}
?>