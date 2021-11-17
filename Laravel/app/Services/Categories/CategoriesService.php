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
     * @return $cates categories list
     */
    public function getCateList()
    {
        return $this->cateDao->getCateList();
    }

    /**
     * To find id for category edit
     * 
     * @param $id category id
     * @return $cate found category
     */
    public function editCate($id)
    {
        return $this->cateDao->editCate($id);
    }

    /**
     * To update category
     * 
     * @param $request
     * @param $id found category id
     * @return updated category
     */
    public function updateCate($request, $id)
    {
        return $this->cateDao->updateCate($request, $id);
    }

    /**
     * To delete category
     * 
     * @param $id 
     * @return 
     */
    public function deleteCate($id)
    {
        return $this->cateDao->deleteCate($id);
    }
    /**
     * To get categories list from post_category
     * 
     * @param $id Postid
     * @return $categories categories list
     */
    public function getCateListwithPostId($id)
    {
        return $this->cateDao->getCateListwithPostId($id);
    }
}
