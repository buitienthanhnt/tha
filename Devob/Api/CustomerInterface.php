<?php

namespace Tha\Devob\Api;
interface CustomerInterface{

/**
 * get data of customer detail
 * method: GET
 * url: {{url}}/{{res}}/{{v}}/customer/1?_tha_sid={{_tha_sid}}
 * ex: http://magento242.com/rest/V1/customer/1?_tha_sid=3tirt3ug43kmcn34eunnt3qlgl
 * @param integer $customer_id
 * @return Tha\Devob\Api\Data\Customer\CustomerDataInterface|null
 */
public function getCustomerData($customer_id);

/**
 * customer login
 * method: POST
 * url: {{url}}/{{res}}/{{v}}/customer/login?user_name=[]&pass=[]]&_tha_sid={{_tha_sid}}
 * ex: http://magento242.com/rest/V1/customer/login?user_name=tha@gmail.com&pass=Jmango360&_tha_sid=3tirt3ug43kmcn34eunnt3qlgl
 * @return Tha\Devob\Api\Data\Customer\CustomerDataInterface|null
 */
public function login();

/**
 * @param integer $customer_id
 * @return mixed
 */
public function customer_address($customer_id);

/**
 * return register form field
 * method:GET
 * url: {{url}}/{{res}}/{{v}}/get_register_form?_tha_sid={{_tha_sid}}
 * ex: http://magento242.com/rest/V1/get_register_form?_tha_sid=3tirt3ug43kmcn34eunnt3qlgl
 * @return \Tha\Devob\Api\Data\Customer\RegisterFormFieldInterface[]
 */
public function get_register_form();

}
?>
