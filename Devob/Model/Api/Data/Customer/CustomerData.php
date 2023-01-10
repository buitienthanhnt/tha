<?php

namespace Tha\Devob\Model\Api\Data\Customer;

use Magento\Framework\Model\AbstractExtensibleModel;
use Tha\Devob\Api\Data\Customer\CustomerDataInterface;

class CustomerData extends AbstractExtensibleModel implements CustomerDataInterface
{
    function setResult($value)
    {
        return $this->setData(self::RESULT, $value);
    }

    function getResult()
    {
        return $this->getData(self::RESULT);
    }

    function setCode($value)
    {
        return $this->setData(self::CODE, $value);
    }

    function getCode()
    {
        return $this->getData(self::CODE);
    }

    function setMessage($value)
    {
        return $this->setData(self::MESSAGE, $value);
    }

    function getMessage()
    {
        return $this->getData(self::MESSAGE);
    }
}

?>