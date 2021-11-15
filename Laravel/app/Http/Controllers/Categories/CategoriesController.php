<?php

namespace App\Http\Categories\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Contracts\Services\Categories\CategoriesServiceInterface;
use App\Http\Controllers\Controller;

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
        return view('admin.categories-manage',  compact('categories'));
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
        $this->cateInterface->getCateCreate($request);
        return redirect('/admin/categories/list');
    }

    /**
     * To delete category by id
     * @param $id
     * @return View task list
     */
    public function deleteCate($id)
    {
        $this->cateInterface->deleteCate($id);
        return redirect('/admin/categories/list');
    }
}
