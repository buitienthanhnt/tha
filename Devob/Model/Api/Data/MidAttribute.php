<?php
namespace Tha\Devob\Model\Api\Data;

use Tha\Devob\Api\Data\MidAttributeInterface;
use Tha\Devob\Model\Api\Data\BaseAttributes;

class MidAttribute extends BaseAttributes implements MidAttributeInterface
{
    public function setLabel($value)
    {
        return $this->setData(self::LABEL, $value);
    }

    public function getLabel()
    {
        return $this->getData(self::LABEL);
    }
}
