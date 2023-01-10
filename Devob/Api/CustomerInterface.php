<?php

namespace Tha\Devob\Api;

interface CustomerInterface{

/**
 * @param integer $customer_id
 * @return Tha\Devob\Api\Data\Customer\CustomerDataInterface|null
 */
public function getCustomerData($customer_id);

/**
 * @return Tha\Devob\Api\Data\Customer\CustomerDataInterface|null
 */
public function login();

/**
 * @param integer $customer_id
 * @return mixed
 */
public function customer_address($customer_id);

}
?>
