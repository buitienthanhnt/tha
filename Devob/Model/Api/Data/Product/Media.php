<?php

namespace Tha\Devob\Model\Api\Data\Product;

use Tha\Devob\Api\Data\Product\MediaInterface;
use Tha\Devob\Model\Api\Data\DataAttributes;

class Media extends DataAttributes implements MediaInterface
{
    function setThumb($value)
    {
        return $this->setData(self::THUMB, $value);
    }

    function getThumb()
    {
        return $this->getData(self::THUMB);
    }

    function setImg($value)
    {
        return $this->setData(self::IMG, $value);
    }

    function getImg()
    {
        return $this->getData(self::IMG);
    }

    function setFull($value)
    {
        return $this->setData(self::FULL, $value);
    }

    function getFull()
    {
        return $this->getData(self::FULL);
    }

    function setCaption($value)
    {
        return $this->setData(self::CAPTION, $value);
    }

    function getCaption()
    {
        return $this->getData(self::CAPTION);
    }

    function setIsMain($value)
    {
        return $this->setData(self::IS_MAIN, $value);
    }

    function getIsMain()
    {
        return $this->getData(self::IS_MAIN);
    }

    function setVideoUrl($value)
    {
        return $this->setData(self::VIDEO_URL, $value);
    }

    function getVideoUrl()
    {
        $this->getData(self::VIDEO_URL);
    }
}



?>