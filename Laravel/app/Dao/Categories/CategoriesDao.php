<?php

namespace App\Dao\Categories;

use App\Models\Categories;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Contracts\Dao\Categories\CategoriesDaoInterface;
use App\Models\PostCategory;
use App\Models\UserCategory;

class CategoriesDao implements CategoriesDaoInterface
{

    /**
     * To get categories list
     * 
     * @return $categories categories list
     */
    public function getCateList()
    {
        $categories = Categories::orderBy('created_at', 'asc')->get();
        return $categories;
    }

    /**
     * To create category
     * 
     * @param $request
     * @return $cate created new category
     */
    public function getCateCreate($request)
    {
        $cate = new Categories;
        $cate->name = $request->name;
        $cate->created_user_id = Auth::user()->id ?? 1;
        $cate->updated_user_id = Auth::user()->id ?? 1;
        $cate->save();
        return $cate;
    }

    /**
     * To find id for category edit
     * 
     * @param $id category id
     * @return $cate found category
     */
    public function editCate($id)
    {
        $cate = Categories::find($id);

        return $cate;
    }

    /**
     * To update category
     * 
     * @param $request
     * @param $id found category id
     * @return $cate updated category
     */
    public function updateCate($request, $id)
    {
        $cate = Categories::find($id);
        $cate->name = $request->name;
        $cate->save();

        return $cate;
    }

    /**
     * To delete category
     * 
     * @param $id
     * @return $cate  
     */
    public function deleteCate($id)
    {
        $cate = Categories::findOrFail($id);
        $cate->deleted_user_id = Auth::user()->id ?? 1;
        $cate->deleted_at = now();
        $cate->save();

        return $cate;
    }
    /**
     * To get categories list from post_category
     * 
     * @param $id Postid
     * @return $categories categories list
     */
    public function getCateListwithPostId($id)
    {
        $postCategory = PostCategory::join('categories', 'categories.id', '=', 'post_category.category_id')
            ->whereNull('post_category.deleted_at')
            ->where('post_id', $id)
            ->get(['post_category.*', 'categories.name']);
        return $postCategory;
    }
    /**
     * Add to user category
     * @param $categoryid
     * @return $usercategory
     */
    public function AddUserCategory($categoryid)
    {
        $userCategory = new UserCategory();
        $userCategory->user_id = Auth::user()->id ?? 1;
        $userCategory->category_id = $categoryid;
        $userCategory->save();
        return $userCategory;
    }
    /**
     * get user category
     * @return $userCategoryList
     */
    public function getUserCategory()
    {
        $userid = Auth::user()->id ?? 1;
        $userCategory = UserCategory::whereNull('deleted_at')
            ->where('user_id', $userid)
            ->get();
        return $userCategory;
    }
    /**
     * Delete userCategory
     * @param $categoryid
     * @return back to previous route
     */
    public function DeleteUserCategory($categoryid)
    {
        $userCategoryList = UserCategory::whereNull('deleted_at')
            ->where('category_id', $categoryid)
            ->get();
        foreach ($userCategoryList as $userCategory) {
            $userCategory->deleted_at = now();
            $userCategory->save();
            return $userCategory;
        }
    }

    /**
     * To get max total followers on category
     * 
     * @return return max total followers on category
     */
    public function getMaxFollowers()
    {
        $count = DB::select(DB::raw(
            'SELECT COUNT(user_category.category_id) total, categories.name
                                    FROM user_category
                                    LEFT JOIN categories ON categories.id = user_category.category_id
                                    GROUP BY user_category.category_id, categories.name
                                    ORDER BY total DESC'
        ));
        return $count;
    }
}
