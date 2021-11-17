<?php

namespace App\Http\Controllers\API\Post;

use App\Contracts\Services\Post\PostServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * This is Post API controller.
 */
class PostAPIController extends Controller
{
    /**
     * post service interface
     */
    private $postServiceInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PostServiceInterface $postServiceInterface)
    {
        $this->postServiceInterface = $postServiceInterface;
    }

    /**
     * To show post list for intial view
     * @return Response json with post list
     */
    public function showPostListForInitial()
    {
        $postList = $this->postServiceInterface->getPostListForInitial();
        return response()->json($postList);
    }

    /**
     * To search posts
     * @param string $id beer id
     * @return View searched post list
     */
    public function searchPost($searchValue)
    {
        $postList = $this->postServiceInterface->searchPost($searchValue);
        return response()->json($postList);
    }

    /**
     * To count total number of posts
     * 
     * @return Analytics blade with number of posts
     */
    public function countTotalPosts()
    {
        $numTotalPosts =  $this->postServiceInterface->countTotalPosts();
        return response()->json($numTotalPosts);
    }
}
