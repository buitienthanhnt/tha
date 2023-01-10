<?php

namespace Tha\Devob\Helper\Api;

use Magento\Framework\App\Helper\AbstractHelper;

class CustomerHelper extends AbstractHelper
{
    protected $customerDataFactory;
    protected $customerResultFactory;
    protected $registerFormFieldFactory;
    protected $sessionManager;

    public function __construct(
        \Tha\Devob\Model\Api\Data\Customer\CustomerDataFactory $customerDataFactory,
        \Tha\Devob\Model\Api\Data\Customer\CustomerResultFactory $customerResultFactory,
        \Tha\Devob\Model\Api\Data\Customer\RegisterFormFieldFactory $registerFormFieldFactory,
        \Magento\Framework\Session\SessionManager $sessionManager
    )
    {
        $this->customerDataFactory = $customerDataFactory;
        $this->customerResultFactory = $customerResultFactory;
        $this->registerFormFieldFactory = $registerFormFieldFactory;
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

    public function get_register_form()
    {
        $register_form_fields = null;

        $email_field = $this->registerFormFieldFactory->create();
        $email_field->setKey("email");
        $email_field->setLabel('email address');
        $email_field->settype("text");
        $email_field->setValue("");
        $email_field->setPosition(1);
        $register_form_fields[] = $email_field;

        $password = $this->registerFormFieldFactory->create();
        $password->setKey("password");
        $password->setLabel('password');
        $password->settype("password");
        $password->setValue("");
        $password->setPosition(2);
        $register_form_fields[] = $password;

        $password_confirmation = $this->registerFormFieldFactory->create();
        $password_confirmation->setKey("password_confirmation");
        $password_confirmation->setLabel('confirmation password');
        $password_confirmation->settype("password");
        $password_confirmation->setValue("");
        $password->setPosition(3);
        $register_form_fields[] = $password_confirmation;

        $first_name = $this->registerFormFieldFactory->create();
        $first_name->setKey("firstname");
        $first_name->setLabel('First Name');
        $first_name->settype("text");
        $first_name->setValue("");
        $first_name->setPosition(4);
        $register_form_fields[] = $first_name;

        $last_name = $this->registerFormFieldFactory->create();
        $last_name->setKey("lastname");
        $last_name->setLabel('Last Name');
        $last_name->settype("text");
        $last_name->setValue("");
        $last_name->setPosition(5);
        $register_form_fields[] = $last_name;

        return $register_form_fields;
    }
}


?>
