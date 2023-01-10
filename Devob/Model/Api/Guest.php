<?php
namespace Tha\Devob\Model\Api;

use Magento\Framework\Session\SessionManager;
use Tha\Devob\Api\GuestInterface;

class Guest implements GuestInterface
{
    protected $BaseAttributesFactory;
    protected $sessionManager;

    public function __construct(
        SessionManager $sessionManager,
        \Tha\Devob\Model\Api\Data\BaseAttributesFactory $BaseAttributesFactory
    )
    {
        $this->BaseAttributesFactory = $BaseAttributesFactory;
        $this->sessionManager = $sessionManager;
    }

    /**
     * get sid for new guest.
     */
    function getSidValue()
    {
        $value = $this->BaseAttributesFactory->create();
        return $value->setKey("tha_sid")->setValue($this->sessionManager->getSessionId())->setType("string");
    }
}


?>