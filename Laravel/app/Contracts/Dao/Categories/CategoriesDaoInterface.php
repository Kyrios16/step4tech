<?php

namespace App\Contracts\Dao\Categories;

interface CategoriesDaoInterface
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
     * @param $requet
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
}
