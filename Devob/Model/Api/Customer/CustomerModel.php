<?php

namespace Tha\Devob\Model\Api\Customer;

use Exception;

class CustomerModel
{
    protected $customerRepository;
    protected $customerHelper;
    protected $accountManagementInterface;

    public function __construct(
        \Magento\Customer\Model\ResourceModel\CustomerRepository $customerRepository,
        \Tha\Devob\Helper\Api\CustomerHelper $customerHelper,
        \Magento\Customer\Api\AccountManagementInterface $accountManagementInterface
    )
    {
        $this->customerRepository = $customerRepository;
        $this->customerHelper = $customerHelper;
        $this->accountManagementInterface = $accountManagementInterface;
    }

    public function getCustomerData($customer_id)
    {
        return $this->customerHelper->convert_customer($this->customerRepository->getById($customer_id));
    }

    public function login($user, $pass)
    {
        $customer = $this->accountManagementInterface->authenticate($user, $pass);
        if ($customer) {
            return $this->customerHelper->convert_customer($customer);
        }else {
            throw new Exception("data not has", 300);
        }
    }

    /**
     * Magento\Customer\Model\Address\AddressModelInterface
     */
    public function get_customer_address($customer_id) 
    {
        if (!$customer = $this->customerRepository->getById($customer_id)) {
            throw new Exception("the customer data not exist!!", 300);
        }
        $address = $customer->getAddresses();
        return $address;
    }

    public function get_register_form()
    {
        return $this->customerHelper->get_register_form();
    }
}


?>
