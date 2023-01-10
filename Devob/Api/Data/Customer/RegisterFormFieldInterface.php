<?php
namespace Tha\Devob\Api\Data\Customer;

use Tha\Devob\Api\Data\DataAttributesInterface;

interface RegisterFormFieldInterface extends DataAttributesInterface
{

    const MORE_ATTR = "more_attr";
    /**
     * Undocumented function
     *
     * @param \Tha\Devob\Api\Data\BaseAttributesInterface[] $param
     * @return $this
     */
    public function setMoreAttr($param);

    /**
     * @return \Tha\Devob\Api\Data\BaseAttributesInterface[]
     */
    public function getMoreAttr();

}
