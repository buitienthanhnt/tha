<?php

namespace Tha\Devob\Model\Api\Data\Product\Config;

use Tha\Devob\Api\Data\Product\Config\ConfigDataInterface;
use Tha\Devob\Model\Api\Data\DataAttributes;

class ConfigData extends DataAttributes implements ConfigDataInterface
{
    function setAttributes($value)
    {
        return $this->setData(self::ATTRIBUTES, $value);
    }

    function getAttribute()
    {
        return $this->getData(self::ATTRIBUTES);
    }

    function setImages($value)
    {
        return $this->setData(self::IMAGES, $value);
    }

    function getImages()
    {
        return $this->getData(self::IMAGES);
    }

    function setChooseText($value)
    {
        return $this->setData(self::CHOOSE_TEXT, $value);
    }

    function getChooseText()
    {
        return $this->getData(self::CHOOSE_TEXT);
    }

    function setIndex($value)
    {
        return $this->setData(self::INDEX, $value);
    }

    function getIndex()
    {
        return $this->getData(self::INDEX);
    }
}

?>