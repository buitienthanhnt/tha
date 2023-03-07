<?php

namespace Tha\Devob\Controller\Obj;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\ObjectManagerInterface;
use Tha\Core\Helper\LogHelper;

class index implements ActionInterface
{
    protected $objectManagerInterface;
    protected $resultFactory;
    protected $tha_logger;
    protected $logHelper;

    public function __construct(
        ObjectManagerInterface $objectManagerInterface,
        ResultFactory $resultFactory,
        \Tha\Core\Logger\Logger $tha_logger,
        LogHelper $logHelper
    )
    {
        $this->objectManagerInterface = $objectManagerInterface;
        $this->resultFactory = $resultFactory;
        $this->tha_logger = $tha_logger;
        $this->logHelper = $logHelper;
    }

    public function execute()
    {
        // $objectManagerInterface = $this->objectManagerInterface;
        // var_dump(get_class($objectManagerInterface->get("Jmango360\Japi\Helper\Product")));
        // var_dump(get_class($this->product));
        // die();

        // $result = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        // $result->setPath("/");
        // return $result;

        // $result = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        // $result->setData(["a" => 123, "status" => 1, "name" => "product name"]);
        // return $result;
        // $this->tha_logger->info('tha nan demo with log file');
        // $this->logHelper->log_write("tha log file demo examp");
        // $this->logHelper->log_txt();
        $this->logHelper->log_custom_file();
        die();
    }

}
?>
