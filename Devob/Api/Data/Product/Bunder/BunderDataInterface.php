<?php
namespace Tha\Devob\Api\Data\Product\Bunder;

use Tha\Devob\Api\Data\DataAttributesInterface;

interface BunderDataInterface extends DataAttributesInterface{
    const PARENT_ID = "parent_id";
    const REQUIRE = "require";
    const SELECTIONS = "selections";

    /**
     * @param integer $value
     * @return $this
     */
    public function setParentId($value);

    /**
     * @return integer
     */
    public function getParentId();

    /**
     * @param boolean $value
     * @return $this
     */
    public function setRequire($value);

    /**
     * @return boolean
     */
    public function getRequire();

    /**
     * @param \Tha\Devob\Api\Data\Product\ItemListInterface[]|null $value
     * @return $this
     */
    public function setSelections($value);

    /**
     * @return \Tha\Devob\Api\Data\Product\ItemListInterface[]|null
     */
    public function getSelections();
    
}

?>