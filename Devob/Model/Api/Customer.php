<?php

namespace Tha\Devob\Model\Api;

use Exception;
use Magento\Framework\Exception\InputException;
use Tha\Devob\Api\CustomerInterface;
use Tha\Devob\Model\Api\Customer\CustomerModel;

class Customer implements CustomerInterface
{
    protected $customerModel;
    protected $request;

    public function __construct(
        CustomerModel $customerModel,
        \Magento\Framework\App\Request\Http $request
    )
    {
        $this->customerModel = $customerModel;
        $this->request = $request;
    }

    public function getCustomerData($customer_id)
    {
        return $this->customerModel->getCustomerData($customer_id);
    }

    public function login()
    {
        $body = $this->request->getContent();

        $user_name = $this->request->getParam('user_name', null);
        $pass = $this->request->getParam("pass", null);
        if (!empty($user_name) && !empty($pass)){
            return $this->customerModel->login($user_name, $pass);
        }else{
            throw new Exception("user_name & pass are require!", 400);
        }
    }

    public function customer_address($customer_id)
    {
        return $this->customerModel->get_customer_address($customer_id);
    }

    public function get_register_form()
    {
        return $this->customerModel->get_register_form();
    }

    public function recent_order($customer_id)
    {
        return $this->customerModel->recent_order($customer_id);
    }

    public function get_wishlist()
    {
        # code...
        return null;
    }
}

?>
