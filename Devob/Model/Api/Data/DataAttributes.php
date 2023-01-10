<?php

namespace Tha\Devob\Model\Api\Data;

use Tha\Devob\Api\Data\DataAttributesInterface;
use Tha\Devob\Model\Api\Data\BaseAttributes;

class DataAttributes extends BaseAttributes implements DataAttributesInterface
{

    function setId($value)
    {
        return $this->setData(self::ID, $value);
    }

    function getId()
    {
        return $this->getData(self::ID);
    }

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

    function setPosition($value)
    {
        return $this->setData(self::POSITION, $value);
    }

    function getPostion()
    {
        return $this->getData(self::POSITION);
    }
}

?>