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
     * @return $cates categories list
     */
    public function getCateList();

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
    /**
     * Add to user category
     * @param $categoryid
     * @return back to previous route
     */
    public function AddUserCategory($categoryid);
    /**
     * get user category
     * @return $userCategoryList
     */
    public function getUserCategory();
    /**
     * Delete userCategory
     * @param $categoryid
     * @return back to previous route
     */
    public function DeleteUserCategory($categoryid);

    /**
     * To get max total followers on category
     * 
     * @return return max total followers on category
     */
    public function getMaxFollowers();
}
