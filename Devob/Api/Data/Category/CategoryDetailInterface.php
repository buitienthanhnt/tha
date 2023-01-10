<?php

namespace Tha\Devob\Api\Data\Category;

interface CategoryDetailInterface{
    const NAME = "name";
    const CATEGORY_ID = "category_id";
    const PARENT_ID = "parent_id";
    const PRODUCT_COUNT = "product_count";
    const ACTIVE = "active";
    const POSITION = "position";
    const UPDATED = "updated_at";
    const URL_PATH = "url_path";
    const CHILDREN_COUNT = "children_count";

    /**
     * @param string $value
     * @return $this
     */
    public function setName($value);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param integer $value
     * @return $this
     */
    public function setCategoryId($value);

    /**
     * @return integer
     */
    public function getCategoryId();

    /**
     * @param integer $value
     * @return $this
     */
    public function setParentId($value);

    /**
     * @return integer
     */
    public function getParentId();

    /**
     * @param bool $value
     * @return $this
     */
    public function setActive($value);

    /**
     * @return bool
     */
    public function getActive();

    /**
     * @param integer $value
     * @return $this
     */
    public function setPosition($value);

    /**
     * @return integer
     */
    public function getPosition();

    /**
     * @param string $value
     * @return $this
     */
    public function setUpdated($value);

    /**
     * @return string
     */
    public function getUpdated();

    /**
     * @param string $value
     * @return $this
     */
    public function setUrlPath($value);

    /**
     * @return string
     */
    public function getUrlPath();

    /**
     * @param integer $value
     * @return $this
     */
    public function setChildrenCount($value);

    /**
     * @return integer
     */
    public function getChildrenCount();
}
?>