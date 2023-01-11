<?php

namespace Tha\Devob\Api;

interface CategoryInterface{
    /**
     * @param integer $cate_id
     * @return mixed
     */
    public function getCategoryData($cate_id);

    /**
     * @param integer $cate_id
     * @return string
     */
    public function getCategoryValue($cate_id);

    /**
     * @return mixed
     */
    public function getCategoryTree();

    /**
     * get list
     * method: GET
     * url: {{url}}/{{res}}/V1/category_List/?category_id=[]&_tha_sid={{_tha_sid}}
     * ex: http://magento242.com/rest/V1/category_List/?_tha_sid=3tirt3ug43kmcn34eunnt3qlgl
     * @return \Tha\Devob\Api\Data\Category\CategoryListInterface
     */
    public function getCategoryList();
}

?>
