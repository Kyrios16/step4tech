<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Contracts\Services\Categories\CategoriesServiceInterface;

class CategoriesController extends Controller
{
    private $cateInterface;

    /**
     * Class Constructor
     * 
     * @param CategoriesServiceInterface
     */
    public function __construct(CategoriesServiceInterface $cateInterface)
    {
        $this->cateInterface = $cateInterface;
    }

    /**
     * To get categories list
     * 
     * @param Request $request
     * @return categories-manage blade with categories list
     */
    public function getCateList(Request $request)
    {
        $categories = $this->cateInterface->getCateList($request);

        return response()->json($categories);
    }

    /**
     * To create category
     * 
     * @param Request $request
     */
    public function getCateCreate(Request $request)
    {
        $validated = validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validated->fails()) {
            return back()->withErrors($validated)->withInput();
        }
        $category = $this->cateInterface->getCateCreate($request);
        return redirect('/admin/categories/');
    }

    /**
     * To find id for category edit
     * 
     * @param $id category id
     * @return $cate found category
     */
    public function editCate($id)
    {
        $category = $this->cateInterface->editCate($id);
        return response()->json($category);
    }


    /**
     * To update category
     * 
     * @param $request
     * @param $id found category id
     */
    public function updateCate(Request $request, $id)
    {
        $validated = validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validated->fails()) {
            return back()->withErrors($validated)->withInput();
        }
        $category = $this->cateInterface->updateCate($request, $id);
        return response()->json($category);
    }

    /**
     * To delete category by id
     * @param $id
     * @return View task list
     */
    public function deleteCate($id)
    {
        $category = $this->cateInterface->deleteCate($id);
        return response()->json($category);
    }
}
