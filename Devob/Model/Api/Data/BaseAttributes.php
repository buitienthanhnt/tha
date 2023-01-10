<?php
namespace Tha\Devob\Model\Api\Data;

use Magento\Framework\Model\AbstractExtensibleModel;
use Tha\Devob\Api\Data\BaseAttributesInterface;

class BaseAttributes extends AbstractExtensibleModel implements BaseAttributesInterface
{
    function setKey($value)
    {
        return $this->setData(self::KEY, $value);
    }

    function getKey()
    {
        return $this->getData(self::KEY);
    }

    function setValue($value)
    {
        return $this->setData(self::VALUE, $value);
    }

    function getValue()
    {
        return $this->getData(self::VALUE);
    }

    function setType($value)
    {
        return $this->setData(self::TYPE, $value);
    }

    function getType()
    {
        return $this->getData(self::TYPE);
    }
}

?>