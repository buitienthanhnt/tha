<?php

namespace Tha\Devob\Model\Api\Customer;

use Exception;
use Magento\Customer\Model\ResourceModel\CustomerRepository;
use Tha\Devob\Helper\Api\CustomerHelper;

class CustomerModel
{
    protected $customerRepository;
    protected $customerHelper;
    protected $accountManagementInterface;

    public function __construct(
        CustomerRepository $customerRepository,
        CustomerHelper $customerHelper,
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

    public function get_customer_address($customer_id)
    {
        if (!$customer = $this->customerRepository->getById($customer_id)) {
            throw new Exception("the customer data not exist!!", 300);
        }
        $address = $customer->getAddresses();
        return $address;
        return $this->customerHelper->convert_customer_address($address);
    }
}


?>
