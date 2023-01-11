<?php

namespace Tha\Devob\Api\Data\Customer;

interface CustomerResultInterface{
    const CUSTOMER_ID = "customer_id";
    const NAME = "name";
    const FIRST_NAME = "first_name";
    const LAST_NAME = "last_name";
    const MIDDLE_NAME ="middle_name";
    const EMAIL = 'email';
    const CREATED_AT = "created_at";
    const CREATED_IN = "created_in";
    const UPDATED_AT = "updated_at";
    const ACTIVE = "active";
    const GROUP_ID = "group_id";
    const THA_SID = "tha_sid";
    const DEFAULT_BILLING_ADDRESS = "default_billing_address";
    const DEFAULT_SHIPPING_ADDRESS = "default_shipping_address";

    /**
     * @param integer $value
     * @return $this
     */
    public function setCustomerId($value);
    
    /**
     * @return integer
     */
    public function getCustomerId();

    /**
     * @param string $value
     * @return $this
     */
    public function setName($value);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $value
     * @return $this
     */
    public function setFirstName($value);

    /**
     * @return string
     */
    public function getFirstName();

        /**
     * @param string $value
     * @return $this
     */
    public function setLastName($value);

    /**
     * @return string
     */
    public function getLastName();

        /**
     * @param string $value
     * @return $this
     */
    public function setMiddleName($value);

    /**
     * @return string
     */
    public function getMiddleName();

    /**
     * @param string $value
     * @return $this
     */
    public function setEmail($value);

    /**
     * @return string
     */
    public function getEmail();

    /**
     * @param string $value
     * @return $this
     */
    public function setCreatedAt($value);

    /**
     * @return string
     */
    public function getCreatedAt();

    /**
     * @param string $value
     * @return $this
     */
    public function setCreatedIn($value);

    /**
     * @return string
     */
    public function getCreatedIn();
    
    /**
     * @param string $value
     * @return $this
     */
    public function setUpdatedAt($value);

    /**
     * @return string
     */
    public function getUpdatedAt();
    
    /**
     * @param bool $value
     * @return $this
     */
    public function setActive($value);

    /**
     * @return bool
     */
    public function getActive();

    /**
     * @param integer $value
     * @return $this
     */
    public function setGroupId($value);
    
    /**
     * @return integer
     */
    public function getGroupId();

    /**
     * @param string $value
     * @return $this
     */
    public function setThaSid($value);

    /**
     * @return string
     */
    public function getThaSid();

    /**
     * @param \Magento\Customer\Api\Data\AddressInterface $value
     * @return $this
     */
    public function setDefaultBillingAddress($value);

    /**
     * @return \Magento\Customer\Api\Data\AddressInterface
     */
    public function getDefaultBillingAddress();

    /**
     * @param \Magento\Customer\Api\Data\AddressInterface $value
     * @return $this
     */
    public function setDefaultShippingAddress($value);

    /**
     * @return \Magento\Customer\Api\Data\AddressInterface
     */
    public function getDefaultShippingAddress();
    
    
}
?>