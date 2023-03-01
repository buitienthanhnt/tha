<?php

namespace Tha\Devob\Api\Data\Customer;

interface CustomerDataInterface extends \Magento\Framework\Api\ExtensibleDataInterface{
    const RESULT = "result";
    const CODE = "code";
    const MESSAGE = "message";

    /**
     * @param Tha\Devob\Api\Data\Customer\CustomerResultInterface $value
     * @return $this
     */
    public function setResult($value);

    /**
     * @return Tha\Devob\Api\Data\Customer\CustomerResultInterface
     */
    public function getResult();

    /**
     * @param integer $value
     * @return $this
     */
    public function setCode($value);

    /**
     * @return integer
     */
    public function getCode();
    
    /**
     * @param string $value
     * @return $this
     */
    public function setMessage($value);
    
    /**
     * @return string
     */
    public function getMessage();
    
    
}
?>