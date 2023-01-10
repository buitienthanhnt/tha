<?php
namespace Tha\Devob\Api\Data\Product\Config;

interface ConfigDataInterface{

    const ATTRIBUTES = "attributes";
    const IMAGES = "images";
    const INDEX = "index";
    const CHOOSE_TEXT = 'chooseText';

    /**
     * @param \Tha\Devob\Api\Data\Product\Config\AttributesInterface[]|null $value
     * @return $this
     */
    public function setAttributes($value);

    /**
     * @return \Tha\Devob\Api\Data\Product\Config\AttributesInterface[]|null
     */
    public function getAttribute();

     /**
     * @param \Tha\Devob\Api\Data\Product\MediaInterface[]|null $value
     * @return $this
     */
    public function setImages($value);

    /**
     * @return \Tha\Devob\Api\Data\Product\MediaInterface[]|null
     */
    public function getImages();

     /**
     * @param \Tha\Devob\Api\Data\Product\Config\ConfigIndexInterface[] $value
     * @return $this
     */
    public function setIndex($value);

    /**
     * @return \Tha\Devob\Api\Data\Product\Config\ConfigIndexInterface[]
     */
    public function getIndex();
    
     /**
     * @param string $value
     * @return $this
     */
    public function setChooseText($value);

    /**
     * @return string
     */
    public function getChooseText();

    // {
        //     attributes
        //     images
        //     index
        //     chooseText
    // }
}
?>