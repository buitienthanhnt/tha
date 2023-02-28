<?php

namespace Tha\Nan\Controller\Dev;

use Magento\Framework\App\ActionInterface;
use Magento\Store\Model\StoreManager;
use Tha\Cache\Helper\Cache;

class index implements ActionInterface
{
    
    protected $storeManager;
    protected $cache_helper;

    public function __construct(
        StoreManager $storeManager,
        Cache $cache_helper
    )
    {
        $this->storeManager = $storeManager;
        $this->cache_helper = $cache_helper;
    }

    public function execute()
    {
        // $storeManager = $this->storeManager;
        // echo $storeManager->getStore()->getId();
        $data = "day la noi dung cache cua product_id = 1";
        $cache_id = $this->cache_helper->getId(1, ["pro_id_1"]);
        if ($cache_data = $this->cache_helper->load($cache_id)) {
            var_dump($cache_data);
        }else {
            $this->cache_helper->save($data, $cache_id);
            echo "not has cache data";
        }
        exit();
    }
}


?>