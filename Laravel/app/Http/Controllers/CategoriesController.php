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

        $cate = $this->cateInterface->getCateCreate($request);

        return redirect('/admin/categories')->with('message', 'You successfully created new category!');
    }

    /**
     * To get categories list
     * 
     * @param Request $request
     * @return categories-management blade with categories list
     */
    public function getCateList(Request $request)
    {
        $cate = $this->cateInterface->getCateCreate($request);

        return view('admin.categories-management', ['cates' => $cate]);
    }
}
