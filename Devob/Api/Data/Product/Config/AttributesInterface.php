<?php
namespace Tha\Devob\Api\Data\Product\Config;

use Tha\Devob\Api\Data\DataAttributesInterface as DataAttributesInterface;

interface AttributesInterface extends DataAttributesInterface{
    const OPTIONS = "options";

    /**
     * @param Tha\Devob\Api\Data\Product\Config\OptionInterface[]|null $value
     * @return $this
     */
    public function setOptions($value);

    /**
     * @return Tha\Devob\Api\Data\Product\Config\OptionInterface[]|null
     */
    public function getOptions();
    
    // {
        //     "id": "93",
        //     "code": "color",
        //     "label": "Color",
        //     "options": [
        //       {
        //         "id": "53",
        //         "label": "Green",
        //         "products": [
        //           "151",
        //           "154",
        //           "157",
        //           "160",
        //           "163"
        //         ]
        //       }
        //     ],
        //     "position": "1"
    // }
}
?>