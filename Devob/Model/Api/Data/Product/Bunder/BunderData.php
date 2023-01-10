<?php
namespace Tha\Devob\Model\Api\Data\Product\Bunder;

use Tha\Devob\Api\Data\Product\Bunder\BunderDataInterface;
use Tha\Devob\Model\Api\Data\DataAttributes;

class BunderData extends DataAttributes implements BunderDataInterface
{
    function setParentId($value)
    {
        return $this->setData(self::PARENT_ID, $value);
    }

    function getParentId()
    {
        return $this->getData(self::PARENT_ID);
    }

    function setRequire($value)
    {
        return $this->setData(self::REQUIRE, $value);
    }

    function getRequire()
    {
        return $this->getData(self::REQUIRE);
    }

    function setSelections($value)
    {
        return $this->setData(self::SELECTIONS, $value);
    }

    function getSelections()
    {
        return $this->getData(self::SELECTIONS);
    }
}


?>