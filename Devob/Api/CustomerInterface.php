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
 * @return \Magento\Customer\Api\Data\AddressInterface[]
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

/**
 * get recent order in customer detail.
 * method: get 
 * url: {{url}}/{{res}}/{{v}}/recent_order/[]?_tha_sid={{_tha_sid}}&_tha_p_limit=[]
 * ex: http://zxc.com/magento2git/rest/V1/recent_order/1?_tha_sid=4vj56rgnc8u3eee54spf80b4ku&_tha_p_limit=1
 * @param integer $customer_id
 * @return \Tha\Devob\Api\Data\Order\OrdersInterface
 */
public function recent_order($customer_id);

/**
 * get wishlist by customer.
 * method: get 
 * url: {{url}}/{{res}}/{{v}}/
 * ex: http://zxc.com/magento2git/rest/V1/recent_order/1?_tha_sid=4vj56rgnc8u3eee54spf80b4ku&_tha_p_limit=1
 * @param integer $customer_id
 * @return \Tha\Devob\Api\Data\Order\OrdersInterface
 */
public function get_wishlist();

}
?>
