<?php

namespace Tha\Devob\Helper\Api;

use Magento\Framework\App\Helper\AbstractHelper;
use Tha\Devob\Model\Api\Data\Cart\CartDetailFactory;

class CartHelper extends AbstractHelper
{
    protected $cartDetailFactory;

    public function __construct(
        CartDetailFactory $cartDetailFactory
    )
    {
        $this->cartDetailFactory = $cartDetailFactory;
    }

    public function formatCartData($quote = null)
    {
        # code...
        return $this->cartDetailFactory->create();
    }
}

?>