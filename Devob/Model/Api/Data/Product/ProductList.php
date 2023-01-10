<?php

namespace Tha\Devob\Model\Api\Data\Product;

use Magento\Framework\Model\AbstractExtensibleModel;

class ProductList extends AbstractExtensibleModel implements \Tha\Devob\Api\Data\Product\ProductListInterface
{
    function setCount($value)
    {
        return $this->setData(self::COUNT, $value);
    }

    function getCount()
    {
        return $this->getData(self::COUNT);
    }

    function setItems($value)
    {
        return $this->setData(self::ITEMS, $value);
    }

    function getItems()
    {
        return $this->getData(self::ITEMS);
    }

    function setFilters($value)
    {
        return $this->setData(self::FILTERS, $value);
    }

    function getFilters()
    {
        return $this->getData(self::FILTERS);
    }

    function setTotals($value)
    {
        return $this->setData(self::TOTALS, $value);
    }

    function getTotals()
    {
        return $this->getData(self::TOTALS);
    }
}

?>