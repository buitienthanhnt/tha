<?php
namespace Tha\Devob\Api\Data\Product\Config;

use Tha\Devob\Api\Data\DataAttributesInterface;

interface OptionInterface extends DataAttributesInterface{
    const PRODUCTS = "products";

    /**
     * @param $value
     * @return $this
     */
    public function setProducts($value);

    /**
     * @return mixed
     */
    public function getProducts();
    
    // {
        //     "id": "49",
        //     "label": "Black",
        //     "products": [
        //       "149",
        //       "152",
        //       "155",
        //       "158",
        //       "161"
        //     ]
    //   }
}


?>