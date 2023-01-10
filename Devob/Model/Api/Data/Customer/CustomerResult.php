<?php
namespace Tha\Devob\Model\Api\Data\Customer;

use Magento\Framework\Model\AbstractExtensibleModel;
use Tha\Devob\Api\Data\Customer\CustomerResultInterface;

class CustomerResult extends AbstractExtensibleModel implements CustomerResultInterface
{
    function setCustomerId($value)
    {
        return $this->setData(self::CUSTOMER_ID, $value);
    }

    function getCustomerId()
    {
        return $this->getData(self::CUSTOMER_ID);
    }

    function setName($value)
    {
        return $this->setData(self::NAME, $value);
    }

    function getName()
    {
        return $this->getData(self::NAME);
    }

    function setFirstName($value)
    {
        return $this->setData(self::FIRST_NAME, $value);
    }

    function getFirstName()
    {
        return $this->getData(self::FIRST_NAME);
    }

    function setLastName($value)
    {
        return $this->setData(self::LAST_NAME, $value);
    }

    function getLastName()
    {
        return $this->getData(self::LAST_NAME);
    }

    function setMiddleName($value)
    {
        return $this->setData(self::MIDDLE_NAME, $value);
    }

    function getMiddleName()
    {
        return $this->getData(self::MIDDLE_NAME);
    }

    function setEmail($value)
    {
        return $this->setData(self::EMAIL, $value);
    }

    function getEmail()
    {
        return $this->getData(self::EMAIL);
    }

    function setCreatedAt($value)
    {
        return $this->setData(self::CREATED_AT, $value);
    }

    function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    function setCreatedIn($value)
    {
        return $this->setData(self::CREATED_IN, $value);
    }

    function getCreatedIn()
    {
        return $this->getData(self::CREATED_IN);
    }

    function setUpdatedAt($value)
    {
        return $this->setData(self::UPDATED_AT, $value);
    }

    function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }

    function setActive($value)
    {
        return $this->setData(self::ACTIVE, $value);
    }

    function getActive()
    {
        return $this->getData(self::ACTIVE);
    }

    function setGroupId($value)
    {
        return $this->setData(self::GROUP_ID, $value);
    }

    function getGroupId()
    {
        return $this->getData(self::GROUP_ID);
    }

    function setThaSid($value)
    {
        return $this->setData(self::THA_SID, $value);
    }

    function getThaSid()
    {
        return $this->getData(self::THA_SID);
    }
}



?>