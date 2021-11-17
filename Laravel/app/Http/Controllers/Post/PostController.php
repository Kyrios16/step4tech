<?php

namespace App\Http\Controllers\Post;

use App\Contracts\Services\Categories\CategoriesServiceInterface;
use App\Contracts\Services\Feedback\FeedbackServiceInterface;
use App\Contracts\Services\Post\PostServiceInterface;
use App\Contracts\Services\User\UserServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\createFeedbackRequest;
use App\Http\Requests\createPostRequest;
use App\Http\Requests\editPostRequest;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use SebastianBergmann\Environment\Console;

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
     * category service interface
     */
    private $categoryServiceInterface;
    /**
     * user service interface
     */
    private $userServiceInterface;
    /**
     * feedback service interface
     */
    private $feedbackServiceInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PostServiceInterface $postServiceInterface, CategoriesServiceInterface $categoriesServiceInterface, UserServiceInterface $userServiceInterface, FeedbackServiceInterface $feedbackServiceInterface)
    {
        $this->postServiceInterface = $postServiceInterface;
        $this->categoryServiceInterface = $categoriesServiceInterface;
        $this->userServiceInterface = $userServiceInterface;
        $this->feedbackServiceInterface = $feedbackServiceInterface;
    }

    /**
     * To search posts
     * @param string $id beer id
     * @return View searched post list
     */
    public function searchPost($searchValue)
    {
        return view('post.search', [
            'title' => "Search - " . $searchValue,
            'searchValue' => $searchValue
        ]);
    }

    /**
     * To show create post view
     * 
     * @return View create post
     */
    public function showPostCreateView(Request $request)
    {
        $title = "Create Post";
        $categories = $this->categoryServiceInterface->getCateList($request);
        return view('post.create',  compact('categories', 'title'));
    }
    /**
     * To check post create form and redirect to confirm page.
     * @param postCreateRequest $request Request form post create
     * @return View post create confirm
     */
    public function submitPostCreateView(createPostRequest $request)
    {
        // validation for request values
        $validated = $request->validated();
        $post = $this->postServiceInterface->savePost($request);
        return redirect('/');
    }
    /**
     * Show post edit
     * 
     * @return View post edit
     */
    public function showPostEditView($id, Request $request)
    {
        $title = "Edit Post";
        $categories = $this->categoryServiceInterface->getCateList($request);
        $post = $this->postServiceInterface->getPostById($id);
        $postCategory = $this->categoryServiceInterface->getCateListwithPostId($id);
        return view('post.edit', compact('post', 'categories', 'postCategory', 'title'));
    }

    /**
     * Submit post edit
     * @param Request $request
     * @param $id
     * @return View post edit confirm view
     */
    public function submitPostEdit(editPostRequest $request, $id)
    {
        $request->validated();
        $test = $this->postServiceInterface->updatedPostById($request, $id);
        return redirect('/');
    }
    /**
     * To delete post by id
     * @return View post list
     */
    public function deletePostById($id)
    {
        $deletedUserId = Auth::user()->id ?? 1;
        $msg = $this->postServiceInterface->deletePostById($id, $deletedUserId);
        return response($msg, 204);
    }
    /**
     * To show post detail view
     * 
     * @return View post detail
     */
    public function showPostDetailView($id)
    {
        $title = "Detail";
        $user = $this->userServiceInterface->getUserById($id);
        $post = $this->postServiceInterface->getPostById($id);
        $date = $post->created_at;
        $date = $date->format('M d, Y');
        $post->created_at = $date;
        $feedbackList = $this->feedbackServiceInterface->getFeedbackbyPostId($id);
        $postCategory = $this->categoryServiceInterface->getCateListwithPostId($id);
        // info($feedbackList);
        return view('post.post-detail', compact('title', 'user', 'post', 'feedbackList', 'postCategory', 'date'));
    }
}
