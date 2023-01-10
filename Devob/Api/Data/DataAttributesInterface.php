<?php

namespace Tha\Devob\Api\Data;

interface DataAttributesInterface extends BaseAttributesInterface{
    const ID = "id";
    const CODE = "code";
    const LABEL = "label";
    const POSITION = "position";

    /**
     * @param integer $value
     * @return $this
     */
    public function setId($value);

    /**
     * @return integer
     */
    public function getId();

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
     * @param string $value
     * @return $this
     */
    public function setLabel($value);

    /**
     * @return string
     */
    public function getLabel();

    /**
     * @param integer $value
     * @return $this
     */
    public function setPosition($value);

    /**
     * @return integer
     */
    public function getPostion();
    
}

?>