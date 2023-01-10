<?php

namespace Tha\Devob\Api\Data\Product;

use Tha\Devob\Api\Data\DataAttributesInterface;

interface MediaInterface extends DataAttributesInterface{

    const THUMB = "thumb";
    const IMG = "img";
    const FULL = "full";
    const CAPTION = "caption";
    const IS_MAIN = "isMain";
    const VIDEO_URL = "videoUrl";

    /**
     * @param string $value
     * @return $this
     */
    public function setThumb($value);

    /**
     * @return string
     */
    public function getThumb();

    /**
     * @param string $value
     * @return $this
     */
    public function setImg($value);

    /**
     * @return string
     */
    public function getImg();

        /**
     * @param string $value
     * @return $this
     */
    public function setFull($value);

    /**
     * @return string
     */
    public function getFull();

    /**
     * @param string $value
     * @return $this
     */
    public function setCaption($value);

    /**
     * @return string
     */
    public function getCaption();

    /**
     * @param bool $value
     * @return $this
     */
    public function setIsMain($value);

    /**
     * @return bool
     */
    public function getIsMain();

    /**
     * @param string $value
     * @return $this
     */
    public function setVideoUrl($value);

    /**
     * @return string
     */
    public function getVideoUrl();
    
    
    // {
    //     id //cos
    //     "thumb": "http://magento241.com/pub/media/catalog/product/cache/2ca26a42c9190dcabf2f715fe83d4c95/m/h/mh07-black_main_1.jpg",
    //     "img": "http://magento241.com/pub/media/catalog/product/cache/2ca26a42c9190dcabf2f715fe83d4c95/m/h/mh07-black_main_1.jpg",
    //     "full": "http://magento241.com/pub/media/catalog/product/cache/2ca26a42c9190dcabf2f715fe83d4c95/m/h/mh07-black_main_1.jpg",
    //     "caption": "",
    //     "position": "1",
    //     "isMain": true,
    //     "type": "image", cos
    //     "videoUrl": null
    // }
}

?>