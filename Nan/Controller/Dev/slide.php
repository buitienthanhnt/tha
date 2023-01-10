<?php

namespace Tha\Nan\Controller\Dev;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\View\Result\PageFactory;

class slide implements ActionInterface
{
    protected $pageFactory;

    public function __construct(
        PageFactory $pageFactory
    ){
        $this->pageFactory = $pageFactory;
    }

    public function execute()
    {
        $page = $this->pageFactory->create();
        $page->getConfig()->getTitle()->prepend("js com");
        return $page;
    }
}
?>