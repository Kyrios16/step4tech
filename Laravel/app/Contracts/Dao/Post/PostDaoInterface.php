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
     * @return postList
     */
    public function getPostListForInitial();
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
}