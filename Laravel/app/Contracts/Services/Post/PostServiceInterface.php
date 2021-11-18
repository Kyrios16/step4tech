<?php

namespace App\Contracts\Services\Post;

use Illuminate\Http\Request;

/**
 * Interface for post service
 */
interface PostServiceInterface
{
    /**
     * To get post list for intial view
     * @return postList
     */
    public function getPostListForInitial();

    /**
     * To search post list
     * @return postList searched post list
     */
    public function searchPost($searchValue);

    /**
     * To save post
     * @param Request $request request with inputs
     * @return Object $post saved post
     */
    public function savePost(Request $request);
    /**
     * To get post by id
     * @param string $id post id
     * @return Object $post post object
     */
    public function getPostById($id);
    /**
     * To update post by id
     * @param Request $request request with inputs
     * @param string $id post id
     * @return Object $post post Object
     */
    public function updatedPostById(Request $request, $id);
    /**
     * To delete post by id
     * @param string $id post id
     * @param string $deletedUserId deleted user id
     * @return string $message message success or not
     */
    public function deletePostById($id, $deletedUserId);

    /**
     * To get all posts list
     */
    public function getPostList();

    /**
     * To count total posts  
     */
    public function countTotalPosts();

    /** To like post
     * @param Request $request
     * @return Object $vote
     */
    public function likePost($request);

    /**
     * To unlike post
     * @param Request $request
     * @return 
     */
    public function unlikePost($request);
}
