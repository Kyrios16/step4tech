<?php

namespace App\Services\Categories;

use App\Contracts\Dao\Categories\CategoriesDaoInterface;
use App\Contracts\Services\Categories\CategoriesServiceInterface;

class CategoriesService implements CategoriesServiceInterface
{
    private $cateDao;

    /**
     * Class Constructor
     * 
     * @param CategoriesDaoInterface
     */
    public function __construct(CategoriesDaoInterface $cateDao)
    {
        $this->cateDao = $cateDao;
    }

    /**
     * To create category
     * 
     * @param $request
     * @return created new category
     */
    public function getCateCreate($request)
    {
        return $this->cateDao->getCateCreate($request);
    }

    /**
     * To get categories list
     * 
     * @param $request
     * @return $cates categories list
     */
    public function getCateList($request)
    {
        return $this->cateDao->getCateList($request);
    }

    /**
     * To find id for category edit
     * 
     * @param $id category id
     * @return $cate found category
     */
    public function cateEdit($id)
    {
        return $this->cateDao->cateEdit($id);
    }

    /**
     * To update category
     * 
     * @param $request
     * @param $id found category id
     * @return updated category
     */
    public function cateUpdate($request, $id)
    {
        return $this->cateDao->cateUpdate($request, $id);
    }

    /**
     * To delete category
     * 
     * @param $id 
     * @return 
     */
    public function cateDelete($id)
    {
        return $this->cateDao->cateDelete($id);
    }
}
