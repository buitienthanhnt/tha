<?php
namespace Tha\Devob\Api\Data\Product;

interface ProductListInterface extends \Magento\Framework\Api\ExtensibleDataInterface{
    const COUNT = "count";
    const ITEMS = "items";
    const FILTERS = "filters";
    const TOTALS = "totals";

    /**
     * @param integer $value
     * @return $this
     */
    public function setCount($value);

    /**
     * @return integer
     */
    public function getCount();

    /**
     * @param Tha\Devob\Api\Data\Product\ItemListInterface[] $value
     * @return $this
     */
    public function setItems($value);

    /**
     * @return Tha\Devob\Api\Data\Product\ItemListInterface[]
     */
    public function getItems();

    /**
     * @param Tha\Devob\Api\Data\Product\FiltersInterface[] $value
     * @return $this
     */
    public function setFilters($value);

    /**
     * @return Tha\Devob\Api\Data\Product\FiltersInterface[]
     */
    public function getFilters();

    /**
     * @param Tha\Devob\Api\Data\Product\FiltersInterface[] $value
     * @return $this
     */
    public function setTotals($value);

    /**
     * @return Tha\Devob\Api\Data\Product\FiltersInterface[]
     */
    public function getTotals();

}
?>