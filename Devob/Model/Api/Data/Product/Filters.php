<?php
namespace Tha\Devob\Model\Api\Data\Product;

use Magento\Framework\Model\AbstractExtensibleModel;
use Tha\Devob\Api\Data\Product\FiltersInterface;

class Filters extends AbstractExtensibleModel implements FiltersInterface
{
    function setCode($value)
    {
        return $this->setData(self::CODE, $value);
    }

    function getCode()
    {
        return $this->getData(self::CODE);
    }

    function setLabel($value)
    {
        return $this->setData(self::LABEL, $value);
    }

    function getLabel()
    {
        return $this->getData(self::LABEL);
    }

    function setValue($value)
    {
        return $this->setData(self::VALUE, $value);
    }

    function getValue()
    {
        return $this->getData(self::VALUE);
    }

    function setAttributes($value)
    {
        return $this->setData(self::ATTRIBUTES, $value);
    }

    function getAttributes()
    {
        return $this->getData(self::ATTRIBUTES);
    }
}

?>