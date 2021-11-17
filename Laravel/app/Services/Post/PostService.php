<?php

namespace App\Services\Post;

use App\Contracts\Dao\Post\PostDaoInterface;
use Illuminate\Http\Request;
use App\Contracts\Services\Post\PostServiceInterface;

/**
 * Service class for post.
 */
class PostService implements PostServiceInterface
{
    /**
     * post dao
     */
    private $postDao;
    /**
     * Class Constructor
     * @param PostDaoInterface
     * @return
     */
    public function __construct(PostDaoInterface $postDao)
    {
        $this->postDao = $postDao;
    }

    /**
     * To get post list for intial view
     * @return postList
     */
    public function getPostListForInitial()
    {
        return $this->postDao->getPostListForInitial();
    }

    /**
     * To search post list
     * @return postList searched post list
     */
    public function searchPost($searchValue)
    {
        return $this->postDao->searchPost($searchValue);
    }

    /**
     * To save post
     * @param Request $request request with inputs
     * @return Object $post saved post
     */
    public function savePost(Request $request)
    {
        return $this->postDao->savePost($request);
    }
    /**
     * To get post by id
     * @param string $id post id
     * @return Object $post post object
     */
    public function getPostById($id)
    {
        return $this->postDao->getPostById($id);
    }

    /**
     * To update post by id
     * @param Request $request request with inputs
     * @param string $id post id
     * @return Object $post post Object
     */
    public function updatedPostById(Request $request, $id)
    {
        return $this->postDao->updatedPostById($request, $id);
    }
    /**
     * To delete post by id
     * @param string $id post id
     * @param string $deletedUserId deleted user id
     * @return string $message message success or not
     */
    public function deletePostById($id, $deletedUserId)
    {
        return $this->postDao->deletePostById($id, $deletedUserId);
    }

    /**
     * To get all posts list
     * 
     * @return posts list from database
     */
    public function getPostList()
    {
        return $this->postDao->getPostList();
    }
}
