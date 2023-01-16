<?php

namespace Tha\Devob\Model\Api\Customer;

use Exception;

class CustomerModel
{
    const ORDER_LIMIT = 5;

    protected $_customerSession;
    protected $customerRepository;
    protected $customerHelper;
    protected $accountManagementInterface;
    protected $_orderCollectionFactory;
    protected $storeManager;
    protected $_orderConfig;
    protected $request;

    public function __construct(
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Customer\Model\ResourceModel\CustomerRepository $customerRepository,
        \Tha\Devob\Helper\Api\CustomerHelper $customerHelper,
        \Magento\Customer\Api\AccountManagementInterface $accountManagementInterface,
        \Magento\Sales\Model\ResourceModel\Order\CollectionFactory $orderCollectionFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Sales\Model\Order\Config $orderConfig,
        \Magento\Framework\App\Request\Http $request
    )
    {
        $this->_customerSession = $customerSession;
        $this->customerRepository = $customerRepository;
        $this->customerHelper = $customerHelper;
        $this->accountManagementInterface = $accountManagementInterface;
        $this->_orderCollectionFactory = $orderCollectionFactory;
        $this->storeManager = $storeManager;
        $this->_orderConfig = $orderConfig;
        $this->request = $request;
    }

    public function getCustomerData($customer_id)
    {
        return $this->customerHelper->convert_customer($this->customerRepository->getById($customer_id));
    }

    public function login($user, $pass)
    {
        $customer = $this->accountManagementInterface->authenticate($user, $pass);
        if ($customer->getId()) {
            $this->_customerSession->loginById($customer->getId());
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

    public function recent_order($customer_id)
    {
        $orders = $this->_orderCollectionFactory->create()->addAttributeToSelect(
            '*'
        )->addAttributeToFilter(
            'customer_id',
            $this->_customerSession->getCustomerId() ?: $customer_id
        )->addAttributeToFilter(
            'store_id',
            $this->storeManager->getStore()->getId()
        )->addAttributeToFilter(
            'status',
            ['in' => $this->_orderConfig->getVisibleOnFrontStatuses()]
        )->addAttributeToSort(
            'created_at',
            'desc'
        )->setPageSize(
            $this->request->getParam("_tha_p_limit") ?: self::ORDER_LIMIT
        )->load();

        return $this->customerHelper->format_order_data($orders);
    }
}


?>
