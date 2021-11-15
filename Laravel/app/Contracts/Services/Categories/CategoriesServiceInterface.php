<?php

namespace App\Contracts\Services\Categories;

interface CategoriesServiceInterface
{
    /**
     * To create category
     * 
     * @param $request
     */
    public function getCateCreate($request);

    /**
     * To get categories list
     * 
     * @param $request
     * @return $cates categories list
     */
    public function getCateList($request);

    /**
     * To find id for category edit
     * 
     * @param $id category id
     */
    public function editCate($id);

    /**
     * To update category
     * 
     * @param $request
     * @param $id found category id
     */
    public function updateCate($request, $id);

    /**
     * To delete category
     * 
     * @param $id 
     */
    public function deleteCate($id);
    /**
     * To get categories list from post_category
     * 
     * @param $id Postid
     * @return $categories categories list
     */
    public function getCateListwithPostId($id);
}
