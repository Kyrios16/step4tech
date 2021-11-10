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
     * To show post list ordered by date
     * @return View post list
     */
    public function showPostListByDate()
    {
        $postList = $this->postServiceInterface->getPostListByDate();
        return view('post.index', [
            'title' => 'Home',
            'posts' => $postList
        ]);
    }
}