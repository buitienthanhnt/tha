<?php

namespace Tha\Core\Helper;

use Exception;
use Magento\Framework\App\Helper\AbstractHelper;

class LogHelper extends AbstractHelper
{
    public function __construct()
    {
    }

    public function log_write($data = "", $filename = "tha_logsysm")
    {
        $file_path = "/var/log/" . $filename . ".log"; // lỗi nếu file này không tồn tại từ trước.
        $writer = new \Zend_Log_Writer_Stream(BP . $file_path);

        $logger = new \Zend_Log();
        $logger->addWriter($writer);

        if (is_string($data)) {
            $logger->info($data);
        } else {
            $logger->info(print_r($data->getData(), true)); // print_r(, true) là trả về giá trị thay vì in ra để xem.
        }
    }

    public function log_custom_file($contents = "<?= ?>", $folder = \Magento\Framework\App\Filesystem\DirectoryList::LOG, $file_path = "tha_log_sysm", $type = "txt")
    {
        try {
            $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
            $filesystem = $objectManager->get('Magento\Framework\Filesystem');

            $dir_log = $filesystem->getDirectoryWrite($folder); // vị trí folder chứa.
            $dir_log->writeFile("$file_path.$type", $contents); // $file_path: vị trí file trong folder.
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
