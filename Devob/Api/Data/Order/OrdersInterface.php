<?php
namespace Tha\Devob\Api\Data\Order;

use Tha\Devob\Api\Data\BaseAttributesInterface;

interface OrdersInterface extends BaseAttributesInterface{
    const RESULT = "result";

    /**
     * set result data
     * @param \Tha\Devob\Api\Data\Order\OrderItemInterface[] $values
     * @return $this
     */
    public function setResult($values);

    /**
     * @return \Tha\Devob\Api\Data\Order\OrderItemInterface[]
     */
    public function getResult();
}
?>