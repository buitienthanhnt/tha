<?php
namespace Tha\Devob\Api\Data\Product;

interface FiltersInterface extends \Magento\Framework\Api\ExtensibleDataInterface{
    const CODE = "code";
    const LABEL = "label";
    const VALUE = " value";
    const ATTRIBUTES = "attributes";

    /**
     * @param string $value
     * @return $this
     */
    public function setCode($value);

    /**
     * @return string
     */
    public function getCode();

    /**
     * @param string
     * @return $this
     */
    public function setLabel($value);
    
    /**
     * @return string
     */
    public function getLabel();

    /**
     * @param string
     * @return $this
     */
    public function setValue($value);
    
    /**
     * @return string
     */
    public function getValue();

    /**
     * @param \Tha\Devob\Api\Data\AttributesInterface[] $value
     * @return $this
     */
    public function setAttributes($value);
    
    /**
     * @return \Tha\Devob\Api\Data\AttributesInterface[]
     */
    public function getAttributes();
    
    
}
?>