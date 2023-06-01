<?php
namespace Tha\Devob\Controller\Obj;

use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\View\Result\PageFactory;

class DemoKnockout implements ActionInterface
{
    protected $pageFactory;
    protected $_fileUploaderFactory;
    protected $_filesystem;

    function __construct(
        PageFactory $pageFactory,
        \Magento\MediaStorage\Model\File\UploaderFactory $fileUploaderFactory,
        \Magento\MediaStorage\Model\File\UploaderFactory $uploaderFactory
    )
    {
        $this->pageFactory = $pageFactory;
        $this->_filesystem = $uploaderFactory;
        $this->_fileUploaderFactory = $fileUploaderFactory;
    }

    public function execute()
    {
        $page = $this->pageFactory->create();
        $page->getConfig()->getTitle()->prepend("tha demo knock");
        return $page;
    }

    public function upload_image()
    {
        $uploader = $this->_fileUploaderFactory->create(['fileId' => 'upload_file']);

        $uploader->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);

        $uploader->setAllowRenameFiles(false);

        $uploader->setFilesDispersion(false);
        $path = $this->_filesystem->getDirectoryRead(DirectoryList::MEDIA)
            ->getAbsolutePath('images/');

        $uploader->save($path);
    }

    function base_upload_image()
    {


// class ConNguoi
// {
//     private $name = "Vũ Thanh Tài";
//     private $age = 20;

//     public static function __set_state(array $arr)
//     {
//         foreach ($arr as $key => $value) {
//             echo $key . '->' . $value . '<br/>';
//         }
//     }
// }

// $connguoi = new ConNguoi();
// eval(var_export($connguoi, true) . ';');


// $string = "beautiful";
// $time = "winter";
// $str = 'This is a $string $time morning!';
// eval("\$str = \"$str\";");
// var_export(123); == var_dum
//echo(1682484766 - 1682484750);
        $entityBody = file_get_contents('php://input');
        $res = $_REQUEST;
        $image_path = $_FILES;

        upload_file();
        echo json_encode([
            "a" => 123,
            "b" => "pppppppp"
        ]);


        function upload_file()
        {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["upload_file"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image

            $check = getimagesize($_FILES["upload_file"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }


// Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }

// Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

// Allow certain file formats
// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
// && $imageFileType != "gif" ) {
//   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//   $uploadOk = 0;
// }

// Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
            } else {

                try {
                    if (move_uploaded_file($_FILES["upload_file"]["tmp_name"], $target_file)) {
                        echo "The file " . htmlspecialchars(basename($_FILES["upload_file"]["name"])) . " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                } catch (\Throwable $th) {
                    echo($th->getMessage());
                }
            }
        }

    }
}

?>
