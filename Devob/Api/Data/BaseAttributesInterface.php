<?php
namespace Tha\Devob\Api\Data;

interface BaseAttributesInterface extends \Magento\Framework\Api\ExtensibleDataInterface{
    const KEY = "key";
    const VALUE = "value";
    const TYPE = "type";

    /**
     * @param string $value
     * @return $this
     */
    public function setKey($value);
    
    /**
     * @return string
     */
    public function getKey();

    /**
     * @param string $value
     * @return $this
     */
    public function setValue($value);

    /**
     * @return string
     */
    public function getValue();
    
    /**
     * @param string $value
     * @return $this
     */
    public function setType($value);
    
    /**
     * @return string
     */
    public function getType();
}

?>