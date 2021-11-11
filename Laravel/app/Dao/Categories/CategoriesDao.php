<?php

namespace App\Dao\Categories;

use App\Models\Categories;
use App\Contracts\Dao\Categories\CategoriesDaoInterface;

class CategoriesDao implements CategoriesDaoInterface
{
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
        $cate->save();

        return $cate;
    }

    /**
     * To get categories list
     * 
     * @param $request
     * @return $cates categories list
     */
    public function getCateList($request)
    {
        $cates = Categories::orderBy('created_at', 'asc')->get();
        return $cates;
    }

    /**
     * To find id for category edit
     * 
     * @param $id category id
     * @return $cate found category
     */
    public function cateEdit($id)
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
    public function cateUpdate($request, $id)
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
    public function cateDelete($id)
    {
        $cate = Categories::find($id);
        $cate->deleted_at = now();
        $cate->save();

        return $cate;
    }
}
