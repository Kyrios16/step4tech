<?php

namespace App\Http\Controllers\Post;

use App\Contracts\Services\Categories\CategoriesServiceInterface;
use App\Contracts\Services\Feedback\FeedbackServiceInterface;
use App\Contracts\Services\Post\PostServiceInterface;
use App\Contracts\Services\User\UserServiceInterface;
use App\Contracts\Services\Vote\VoteServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\createFeedbackRequest;
use App\Http\Requests\createPostRequest;
use App\Http\Requests\editPostRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PostsExport;
use App\Models\Post;
use App\Models\PostCategory;
use Carbon\Carbon;
use DateTime;
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
     * vote service interface
     */
    private $voteServiceInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PostServiceInterface $postServiceInterface, CategoriesServiceInterface $categoriesServiceInterface, UserServiceInterface $userServiceInterface, FeedbackServiceInterface $feedbackServiceInterface, VoteServiceInterface $voteServiceInterface)
    {
        $this->postServiceInterface = $postServiceInterface;
        $this->categoryServiceInterface = $categoriesServiceInterface;
        $this->userServiceInterface = $userServiceInterface;
        $this->feedbackServiceInterface = $feedbackServiceInterface;
        $this->voteServiceInterface = $voteServiceInterface;
    }

    /**
     * To show posts list
     * 
     * 
     */
    public function index()
    {
        $posts = $this->postServiceInterface->getPostList();

        return view('admin.post.posts-manage', compact('posts'));
    }

    /**
     * To show postList
     * @return View post list
     */
    public function showPostList()
    {
        $title = 'Home';
        if(Auth::check()) {
            $userId = Auth::user()->id;
            $user = $this->userServiceInterface->getUserById($userId);
            return view('post.index', compact('title','user'));
        }
        else {
            return view('post.index', compact('title'));
        }
    }

    /**
     * To show liked postList
     * @return View liked post list
     */
    public function showLikedPostList()
    {
        $title = 'Liked Posts';
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $user = $this->userServiceInterface->getUserById($userId);
            return view('post.like', compact('title', 'user'));
        }
    }

    /**
     * To show deleted postList
     * @return View deleted post list
     */
    public function showDeletedPostList()
    {
        $title = 'Trash';
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $user = $this->userServiceInterface->getUserById($userId);
            return view('post.trash', compact('title', 'user'));
        }
    }

    /**
     * To search posts
     * @param string $searchValue searchdata
     * @return View searched post list
     */
    public function searchPost($searchValue)
    {
        $title = "Search - " . $searchValue;
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $user = $this->userServiceInterface->getUserById($userId);
            return view('post.search', compact('title', 'user', 'searchValue'));
        } else {
            return view('post.search', compact('title', 'searchValue'));
        }
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
        $id = Auth::user()->id ?? 1;
        $user = $this->userServiceInterface->getUserById($id);
        return view('post.create',  compact('categories', 'title', 'user'));
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
        $userid = Auth::user()->id ?? 1;
        $user = $this->userServiceInterface->getUserById($userid);
        return view('post.edit', compact('post', 'categories', 'postCategory', 'title', 'user'));
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
        $post = $this->postServiceInterface->getPostById($id);
        $date = $post->created_at;
        $date = $date->format('M d, Y');
        $post->created_at = $date;
        $feedbackList = $this->feedbackServiceInterface->getFeedbackbyPostId($id);
        $postCategory = $this->categoryServiceInterface->getCateListwithPostId($id);
        $voteList = $this->voteServiceInterface->getVoteListwithPostId($id);
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $user = $this->userServiceInterface->getUserById($userId);
            return view('post.post-detail', compact('title', 'post', 'voteList', 'feedbackList', 'postCategory', 'date', 'user'));
        } else {
            return view('post.post-detail', compact('title', 'post', 'voteList', 'feedbackList', 'postCategory', 'date'));
        }
    }
    /**
     * To export posts data form table
     * 
     * @return excel file donwloaded
     */
    public function export()
    {
        return Excel::download(new PostsExport, 'posts.xlsx');
    }
}
