<?php
namespace Tha\Devob\Api\Data;

interface MidAttributeInterface extends BaseAttributesInterface
{
    const LABEL = "label";

    /**
     * @param string $value
     * @return $this
     */
    public function setLabel($value);

    /**
     * @return string
     */
    public function getLabel();

}
