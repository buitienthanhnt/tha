<?php
namespace Tha\Devob\Api\Data\Product\Config;

interface ConfigIndexInterface{
    const PRO_ID = "pro_id";
    const INDEX = "index";

    /**
     * @param integer $value
     * @return $this
     */
    public function setProId($value);

    /**
     * @return integer
     */
    public function getProId();

    /**
     * @param \Tha\Devob\Api\Data\BaseAttributesInterface[]|null
     * @return $this
     */
    public function setIndex($value);
    
    /**
     * @return \Tha\Devob\Api\Data\BaseAttributesInterface[]|null
     */
    public function getIndex();
    
}
?>