<?php

namespace Tha\Devob\Plugin\Session;

use Magento\Framework\App\Request\Http;

class SessionManager{
    protected $request;

    public function __construct(
        Http $request
    )
    {
        $this->request = $request;
    }

    public function beforeStart(\Magento\Framework\Session\SessionManager $sessionManager)
    {
        $request_params = $this->request->getParams();
        $_tha_sid = $request_params["_tha_sid"] ?? null; 
        if ($_tha_sid && $_tha_sid != session_id()) {session_id($_tha_sid);}
        return null;
    }
}

?>