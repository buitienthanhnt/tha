<?php

namespace Tha\Devob\Model\Api\Data\Product\Config;

use Tha\Devob\Api\Data\Product\Config\OptionInterface as ConfigOptionInterface;
use Tha\Devob\Model\Api\Data\DataAttributes;

class Option extends DataAttributes implements ConfigOptionInterface
{
    function setProducts($value)
    {
        return $this->setData(self::PRODUCTS, $value);
    }

    function getProducts()
    {
        return $this->getData(self::PRODUCTS);
    }
}

?>