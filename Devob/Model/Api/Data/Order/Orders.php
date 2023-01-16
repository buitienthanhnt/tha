<?php
namespace Tha\Devob\Model\Api\Data\Order;

use Tha\Devob\Api\Data\Order\OrdersInterface;
use Tha\Devob\Model\Api\Data\BaseAttributes;

class Orders extends BaseAttributes implements OrdersInterface
{
    function setResult($values)
    {
        return $this->setData(self::RESULT, $values);
    }

    function getResult()
    {
        return $this->getData(self::RESULT);
    }
}

?>