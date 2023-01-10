<?php
namespace Tha\Devob\Model\Api\Data\Product\Config;

use Tha\Devob\Api\Data\Product\Config\AttributesInterface;
use Tha\Devob\Model\Api\Data\DataAttributes;

class Attributes extends DataAttributes implements AttributesInterface
{
    function setOptions($value)
    {
        return $this->setData(self::OPTIONS, $value);
    }

    function getOptions()
    {
        return $this->getData(self::OPTIONS);
    }
}

?>