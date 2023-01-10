<?php

namespace Tha\Nan\Controller\Dev;

use Magento\Framework\App\ActionInterface;
use Magento\Store\Model\StoreManager;

class store implements ActionInterface
{
    
    protected $customerSession;
    protected $storeManager;

    public function __construct(
        \Magento\Customer\Model\Session $customerSession,
        StoreManager $storeManager
    )
    {
        $this->storeManager = $storeManager;
        $this->customerSession = $customerSession;
    }

    public function execute()
    {
        echo "store_id laf::-->".$this->storeManager->getStore()->getId();
        echo "<br/>";
        $this->customerSession->setData('store_id', 33);

        echo "store_id hien tai laf::-->".$this->storeManager->getStore()->getId();
        exit();
    }

}

?>