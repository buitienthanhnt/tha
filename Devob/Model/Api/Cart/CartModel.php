<?php
namespace Tha\Devob\Model\Api\Cart;

use Magento\Quote\Model\QuoteRepository;
use Tha\Devob\Helper\Api\CartHelper;

class CartModel{
    protected $quoteRepository;
    protected $cartHelper;

    public function __construct(
        QuoteRepository $quoteRepository,
        CartHelper $cartHelper
    )
    {
        $this->quoteRepository = $quoteRepository;
        $this->cartHelper = $cartHelper;
    }

    public function getCartDetail($cart_id)
    {
        $quote = $this->quoteRepository->get($cart_id);
        return $this->cartHelper->formatCartData($quote);
    }
}

?>