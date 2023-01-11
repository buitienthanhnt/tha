<?php
namespace Tha\Devob\Api;

interface GuestInterface{

    /**
     * get sid for context
     * method: GET
     * url: {{url}}/{{res}}/{{v}}/guest/newsid
     * ex: http://magento242.com/rest/V1/guest/newsid
     * @return \Tha\Devob\Api\Data\BaseAttributesInterface
     */
    public function getSidValue();
}
?>