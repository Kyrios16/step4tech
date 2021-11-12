<?php

namespace App\Http\Controllers\Post;

use App\Contracts\Services\Post\PostServiceInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * This is Post controller.
 */
class PostController extends Controller
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
     * To search posts
     * @param string $id beer id
     * @return View searched post list
     */
    public function searchPost($searchValue) {
        return view('post.search', [
            'title' => "Search - " . $searchValue,
            'searchValue' => $searchValue
        ]);
    }
}