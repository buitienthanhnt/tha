<?php
namespace Tha\Nan\Controller\Dev;

use Exception;
use Magento\Framework\App\ActionInterface;

class UrlRewrite implements ActionInterface
{
    protected $urlRewriteFactory;
    protected $responsele;

    public function __construct(
        \Magento\UrlRewrite\Model\UrlRewriteFactory $urlRewriteFactory,
        \Magento\Framework\App\Console\Response $responsele
    )
    {
        $this->urlRewriteFactory = $urlRewriteFactory;
        $this->responsele = $responsele;
    }
    public function execute()
    {
        $this->rewrite();
        return $this->responsele->setBody("tha controller return");

    }

    protected function rewrite()
    {
        $urlRewrite = $this->_urlRewriteFactory->create();
        $url_collection = $urlRewrite->getCollection();
        if ($url_collection->addFieldToFilter("request_path", 'ao_dai.html')->getItems()) {
           throw new Exception("request_path realy exists", 1);
           
        }
        $page = array(
            'entity_type' => 'category',
            'entity_id' => 12,
            'request_path' => 'ao_dai.html',
            'target_path' => 'catalog/category/view/id/12',
            'store_id' => 1
        );
        $urlRewrite->setData($page);
        $urlRewrite->save();
    }
}

?>