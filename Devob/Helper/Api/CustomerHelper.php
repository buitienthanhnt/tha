<?php

namespace Tha\Devob\Helper\Api;

use Magento\Framework\App\Helper\AbstractHelper;

class CustomerHelper extends AbstractHelper
{
    protected $customerDataFactory;
    protected $customerResultFactory;
    protected $sessionManager;

    public function __construct(
        \Tha\Devob\Model\Api\Data\Customer\CustomerDataFactory $customerDataFactory,
        \Tha\Devob\Model\Api\Data\Customer\CustomerResultFactory $customerResultFactory,
        \Magento\Framework\Session\SessionManager $sessionManager
    )
    {
        $this->customerDataFactory = $customerDataFactory;
        $this->customerResultFactory = $customerResultFactory;
        $this->sessionManager = $sessionManager;
    }

    public function convert_customer($customer)
    {
        $customerResult = $this->customerResultFactory->create();
        $customerResult->setCustomerId($customer->getId());
        $customerResult->setEmail($customer->getEmail());
        $customerResult->setFirstName($customer->getFirstName());
        $customerResult->setLastName($customer->getLastName());
        $customerResult->setMiddleName($customer->getMiddlename());
        $customerResult->setGroupId($customer->getGroupId());
        $customerResult->setCreatedAt($customer->getCreatedAt());
        $customerResult->setUpdatedAt($customer->getUpdatedAt());
        $customerResult->setCreatedIn($customer->getCreatedIn());
        $customerResult->setThaSid($this->sessionManager->getSessionId());

        $customerData = $this->customerDataFactory->create();
        $customerData->setCode(200);
        $customerData->setMessage("customer data success!");
        $customerData->setResult($customerResult);
        return $customerData;
    }

    public function convert_customer_address($address)
    {
        # code...
    }
}


?>
