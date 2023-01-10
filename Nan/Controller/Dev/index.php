<?php

namespace Tha\Nan\Controller\Dev;

use Magento\Framework\App\ActionInterface;
use Magento\Store\Model\StoreManager;

class index implements ActionInterface
{
    
    protected $storeManager;

    public function __construct(
        StoreManager $storeManager
    )
    {
        $this->storeManager = $storeManager;
    }

    public function execute()
    {
        $storeManager = $this->storeManager;
        echo $storeManager->getStore()->getId();
        exit();
    }
}


?>