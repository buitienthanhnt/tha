<?php
namespace Tha\Cache\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Tha\Cache\Model\Cache\Type\ThaApi;

class Cache extends AbstractHelper
{
    protected $cache;
    protected $cacheState;
    protected $storeManager;
    private $storeId;

    public function __construct(
        \Magento\Framework\App\Cache $cache,
        \Magento\Framework\App\Cache\State $cacheState,
        \Magento\Store\Model\StoreManagerInterface $storeManager
    )
    {
        $this->cache = $cache;
        $this->cacheState = $cacheState;
        $this->storeManager = $storeManager;
        $this->storeId = $storeManager->getStore()->getId();
    }

    /**
     * tạo 1 id(khóa cho cache là duy nhất để phân biệt các cache với nhau)
     */
    public function getId($method, $vars = array())
    {
        return base64_encode(implode("^", [$this->storeId, ThaApi::TYPE_IDENTIFIER , $method, ...$vars]));
    }

    // get cache_data với khóa id của hàm: getId trên.
    public function load($cacheId)
    {
        if ($this->cacheState->isEnabled(ThaApi::TYPE_IDENTIFIER)) {
            return $this->cache->load($cacheId);
        }

        return FALSE;
    }

    // lưu 1 cache data với khóa và thời gian.
    public function save($data, $cacheId, $cacheLifetime = ThaApi::CACHE_LIFETIME)
    {
        if ($this->cacheState->isEnabled(ThaApi::TYPE_IDENTIFIER)) {
            $this->cache->save($data, $cacheId, array(ThaApi::CACHE_TAG), $cacheLifetime);
            return TRUE;
        }
        return FALSE;
    }


}
