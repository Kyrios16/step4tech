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
     * To show liked post list
     * @param Request $request
     * @return Response json with liked post list
     */
    public function showLikedPostList(Request $request)
    {
        $postList = $this->postServiceInterface->getLikedPostList($request);
        return response()->json($postList);
    }

    /**
     * To show deleted post list
     * @param Request $request
     * @return Response json with deleted post list
     */
    public function showDeletedPostList(Request $request)
    {
        $postList = $this->postServiceInterface->getDeletedPostList($request);
        return response()->json($postList);
    }

    /**
     * To search posts
     * @param string $id beer id
     * @return Response json with searched post list
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

    /**
     * To like post
     * @param Request $request
     * @return Response json with $vote
     */
    public function likePost(Request $request)
    {
        $vote = $this->postServiceInterface->likePost($request);
        return response()->json($vote);
    }

    /**
     * To unlike post
     * @param Request $request
     * @return Response json with $vote
     */
    public function unlikePost(Request $request)
    {
        $this->postServiceInterface->unlikePost($request);
        return response()->json("Unlike Success");
    }

    /**
     * To show personal post list
     * @param Request $request
     * @return Response json with personal post list
     */
    public function showPersonalPostList(Request $request)
    {
        $postList = $this->postServiceInterface->getPersonalPostList($request);
        return response()->json($postList);
    }

    /**
     * To delete post by id
     * @return Response json with message
     */
    public function deletePostById($id, Request $request)
    {
        $deletedUserId = $request->userId;
        $msg = $this->postServiceInterface->deletePostById($id, $deletedUserId);
        return response()->json($msg);
    }

    /**
     * To recover post by id
     * @return Response json with recovered post
     */
    public function recoverPostById($id)
    {
        $post = $this->postServiceInterface->recoverPostById($id);
        return response()->json($post);
    }
}
