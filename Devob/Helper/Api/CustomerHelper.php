<?php

namespace Tha\Devob\Helper\Api;

use Magento\Framework\App\Helper\AbstractHelper;

class CustomerHelper extends AbstractHelper
{
    protected $customerDataFactory;
    protected $customerResultFactory;
    protected $registerFormFieldFactory;
    protected $baseAttributesFactory;
    protected $ordersFactory;
    protected $sessionManager;

    public function __construct(
        \Tha\Devob\Model\Api\Data\Customer\CustomerDataFactory $customerDataFactory,
        \Tha\Devob\Model\Api\Data\Customer\CustomerResultFactory $customerResultFactory,
        \Tha\Devob\Model\Api\Data\Customer\RegisterFormFieldFactory $registerFormFieldFactory,
        \Tha\Devob\Model\Api\Data\BaseAttributesFactory $baseAttributesFactory,
        \Tha\Devob\Model\Api\Data\Order\OrdersFactory $ordersFactory,
        \Magento\Framework\Session\SessionManager $sessionManager
    )
    {
        $this->customerDataFactory = $customerDataFactory;
        $this->customerResultFactory = $customerResultFactory;
        $this->registerFormFieldFactory = $registerFormFieldFactory;
        $this->baseAttributesFactory = $baseAttributesFactory;
        $this->ordersFactory = $ordersFactory;
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
        $customer_default_address = $this->customer_default_address($customer->getAddresses());
        $customerResult->setDefaultBillingAddress($customer_default_address["default_billing"]);
        $customerResult->setDefaultShippingAddress($customer_default_address["default_shipping"]);

        $customerData = $this->customerDataFactory->create();
        $customerData->setCode(200);
        $customerData->setMessage("customer data success!");
        $customerData->setResult($customerResult);
        return $customerData;
    }

    public function customer_default_address($address_list = null)
    {
        $default_value = ["default_billing" => null, "default_shipping" => null];
        if (count($address_list)) {
            foreach ($address_list as $value) {
                if ($value->isDefaultShipping()) {
                    $default_value["default_shipping"] = $value;
                }
    
                if ($value->isDefaultBilling()) {
                    $default_value["default_billing"] = $value;
                }
            }
        }

        return $default_value;
    }

    public function get_register_form()
    {
        $register_form_fields = null;
        $register_form_fields[] = $this->field_data('email', "email address", "text", "", 1, [["require","1"], ["placeholder","input email address"]]);

        $register_form_fields[] = $this->field_data('password', "Password", "password", "", 2, [["require","1"], ["placeholder","input password"]]);

        $register_form_fields[] = $this->field_data('password_confirmation', "confirmation password", "password", "", 3, [["require","1"], ["placeholder","input password"]]);

        $register_form_fields[] = $this->field_data('firstname', "First Name", "text", "", 4, [["require","1"], ["placeholder","First Name"]]);

        $register_form_fields[] = $this->field_data('lastname', "Last Name", "text", "", 5, [["require","1"], ["placeholder","Last Name"]]);

        $register_form_fields[] = $this->field_data('is_subscribed', "Sign Up For Newsletter", "checkbox", "", 6, [["require","0"]]);

        $register_form_fields[] = $this->field_data('assistance_allowed_checkbox', "Allow remote shopping assistance", "checkbox", "", 7, [["require","0"]]);

        return $register_form_fields;
    }

    public function field_data($key="", $label="", $type="", $value="", $position=null, $more_attr=[])
    {
        $field_data = $this->registerFormFieldFactory->create();
        $field_data->setKey($key);
        $field_data->setLabel($label);
        $field_data->settype($type);
        $field_data->setValue($value);
        $field_data->setPosition($position);
        $field_data->setMoreAttr(array_map(function($attr){return $this->more_attr_data(...$attr);}, $more_attr));
        return $field_data;
    }

    public function more_attr_data($key=null, $value=null, $type=null)
    {
        $attr_value = $this->baseAttributesFactory->create();
        $attr_value->setKey($key);
        $attr_value->setValue($value);
        $attr_value->setType($type);
        return $attr_value;
    }

    public function format_order_data($orders = null)
    {
       $ordersFactory = $this->ordersFactory->create();
       return $ordersFactory;
    }
}
?>
