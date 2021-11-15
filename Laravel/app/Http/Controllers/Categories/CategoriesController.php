<?php

namespace App\Http\Controllers\Categories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CategoriesExport;
use App\Http\Controllers\Controller;
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
     * @return Response categories list
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
     * @return redirect
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
     * @return Response found category
     */
    public function editCate($id)
    {
        $category = $this->cateInterface->editCate($id);
        return response()->json($category);
    }


    /**
     * To update category
     * 
     * @param Request $request
     * @param $id found category id
     * @return Response updated category
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
     * @return Response message
     */
    public function deleteCate($id)
    {
        $category = $this->cateInterface->deleteCate($id);
        return response(['message' => $category]);
    }

    /**
     * To export categories data form table
     * 
     * @return excel file donwloaded
     */
    public function export()
    {
        return Excel::download(new CategoriesExport, 'categories.xlsx');
    }
}
