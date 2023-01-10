<?php
namespace Tha\Nan\Plugin\Model\Quote;

use Magento\Framework\App\Request\Http;
use Magento\Framework\ObjectManagerInterface;

class Address{
    protected $request;
    protected $objectManagerInterface;

    public function __construct(
        Http $request,
        ObjectManagerInterface $objectManagerInterface
    )
    {
        $this->request = $request;
        $this->objectManagerInterface = $objectManagerInterface;
    }

    public function aroundGetShippingRateByCode(\Magento\Quote\Model\Quote\Address $subject, callable $proceed, $vars)
    {
        if ($vars == "" || $vars == "tha_nan") {
            return true;
        }
        $result = $proceed($vars);
        return $result;
    }
}

?>