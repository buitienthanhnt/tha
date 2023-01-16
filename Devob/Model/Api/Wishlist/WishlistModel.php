<?php

namespace Tha\Devob\Model\Api\Wishlist;

class WishlistModel
{
    protected $wishlist_block;
    protected $product_helper;
    protected $wishlistItemFactory;

    public function __construct(
        \Magento\Wishlist\Block\Customer\Wishlist $wishlist_block,
        \Tha\Devob\Helper\Api\ProductHelp $product_helper,
        \Tha\Devob\Model\Api\Data\Wishlist\WishlistItemFactory $wishlistItemFactory
    )
    {
        $this->wishlist_block = $wishlist_block;
        $this->product_helper = $product_helper;
        $this->wishlistItemFactory = $wishlistItemFactory;
    }

    public function get_wishlist_items()
    {
        $wishlist_items = $this->wishlist_block->getWishlistItems();
        $products = [];
        if ($items = $wishlist_items->getItems()) {
            foreach ($items as $value) {
                $products[] = $value->getProduct();
            }
        }
        return $this->wishlistItemFactory->create()->setItems($this->product_helper->get_list_products($products));
    }
}


?>