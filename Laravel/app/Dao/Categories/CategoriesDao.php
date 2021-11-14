<?php

namespace App\Dao\Categories;

use App\Models\Categories;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Contracts\Dao\Categories\CategoriesDaoInterface;

class CategoriesDao implements CategoriesDaoInterface
{

    /**
     * To get categories list
     * 
     * @param $request
     * @return $categories categories list
     */
    public function getCateList($request)
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
        $cate->deleted_at = now();
        $cate->save();

        return $cate;
    }
}
