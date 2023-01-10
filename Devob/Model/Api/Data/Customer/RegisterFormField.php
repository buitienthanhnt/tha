<?php
namespace Tha\Devob\Model\Api\Data\Customer;

use Tha\Devob\Api\Data\Customer\RegisterFormFieldInterface;
use Tha\Devob\Model\Api\Data\DataAttributes;

class RegisterFormField extends DataAttributes implements RegisterFormFieldInterface
{
    public function setMoreAttr($param)
    {
        return $this->setData(self::MORE_ATTR, $param);
    }

    function getMoreAttr()
    {
        return $this->getData(self::MORE_ATTR);
    }
}