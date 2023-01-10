<?php
namespace Tha\Devob\Model\Api\Data\Product\Config;

use Magento\Framework\Model\AbstractExtensibleModel;
use Tha\Devob\Api\Data\Product\Config\ConfigIndexInterface;

class ConfigIndex extends AbstractExtensibleModel implements ConfigIndexInterface
{
    function setProId($value)
    {
        return $this->setData(self::PRO_ID, $value);
    }

    function getProId()
    {
        return $this->getData(self::PRO_ID);
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