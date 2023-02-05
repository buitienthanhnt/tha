<?php
namespace Tha\Devob\Helper\Api;

use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{
    const IP_JM = "192.168.100.138";
    const IP_MO = "192.168.1.153";
    // const ADDRESS_243 = "magento243/pub";
    const ADDRESS_243 = "magento242/pub";
    // const ADDRESS_241 = "magento243x";// m4700
    const ADDRESS_241 = "magento241x";// m6800
    // const ADDRESS_241 = "magento2git";  // jm360desktop

    const USE_CURRENT = true;
    const CURRENT = "jmo";
    const CUR_DIR = "241";

    const CACHE_ENA = false;

    protected $objectManager;
    protected $storeManager;
    protected $scopeConfig;

    public function __construct(
        \Magento\Framework\ObjectManagerInterface $objectManagerInterface,
        \Magento\Store\Model\StoreManager $storeManager,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
    )
    {
        $this->objectManager = $objectManagerInterface;
        $this->storeManager = $storeManager;
        $this->scopeConfig = $scopeConfig;
    }

    public function api_url_replace($url = "")
    {
        $current_ip = self::CURRENT == "jm" ? self::IP_JM : self::IP_MO;
        $current_dir = self::CUR_DIR == "241" ? self::ADDRESS_241 : self::ADDRESS_243;
        $ip = self::USE_CURRENT ? $current_ip : $this->scopeConfig->getValue("setting/devob_domain/ip_address");
        $dir = self::USE_CURRENT ? $current_dir : $this->scopeConfig->getValue("setting/devob_domain/dir");
        $current_store = $this->storeManager->getStore();
        $url = str_replace($current_store->getBaseUrl(), "http://".$ip."/".$dir."/", $url);
        $url = str_replace("\\", "/", $url);
        return $url;
        // https://htmlcolorcodes.com/color-picker/
        // return str_replace(str_replace($current_store->getStorePath(), "", $current_store->getBaseUrl()), "http://".$ip."/".$dir."/", $url);
    }
}
