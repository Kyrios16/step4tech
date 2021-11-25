<?php

namespace App\Contracts\Dao\Post;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of post
 */
interface PostDaoInterface
{
    /**
     * To get post list for intial view
     * @param Request $request
     * @return postList
     */
    public function getPostListForInitial($request);

    /**
     * To get post list for load more
     * @param Request $request
     * @return postList
     */
    public function getPostListForInitialLoadMore($request);

    /**
     * To show liked post list
     * @param Request $request
     * @return postList liked post list
     */
    public function getLikedPostList($request);

    /**
     * To show deleted post list
     * @param Request $request
     * @return postList deleted post list
     */
    public function getDeletedPostList($request);

    /**
     * To search post list
     * @param string $searchValue
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
    public function deletePostById($id);

    /**
     *  To get all posts list
     */
    public function getPostList();

    /**
     * To count total posts 
     * 
     */
    public function countTotalPosts();

    /**
     * To get max likes on post
     * 
     * @return return max likes on post
     */
    public function getMaxLikes();

    /* * To like post
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

    /**
     * To show personal post list
     * @param Request $request
     * @return postList personal post list
     */
    public function getPersonalPostList($request);

    /**
     * To recover post by id
     * @param string $id post id
     * @return Object $post recovered post
     */
    public function recoverPostById($id);
}
