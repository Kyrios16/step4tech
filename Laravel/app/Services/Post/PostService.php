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
     * @param Request $request
     * @return postList
     */
    public function getPostListForInitial($request)
    {
        return $this->postDao->getPostListForInitial($request);
    }

    /**
     * To show liked post list
     * @param Request $request
     * @return postList liked post list
     */
    public function getLikedPostList($request)
    {
        return $this->postDao->getLikedPostList($request);
    }

    /**
     * To show deleted post list
     * @param Request $request
     * @return postList deleted post list
     */
    public function getDeletedPostList($request)
    {
        return $this->postDao->getDeletedPostList($request);
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
    public function deletePostById($id)
    {
        return $this->postDao->deletePostById($id);
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

    /**
     * To count total posts 
     * 
     * @return return number of posts
     */
    public function countTotalPosts()
    {
        return $this->postDao->countTotalPosts();
    }

    /**
     * To get max likes on post
     * 
     * @return return max likes on post
     */
    public function getMaxLikes()
    {
        return $this->postDao->getMaxLikes();
    }

    /** 
     *  To like post
     * @param Request $request
     * @return Object $vote
     */
    public function likePost($request)
    {
        return $this->postDao->likePost($request);
    }

    /**
     * To unlike post
     * @param Request $request
     * @return 
     */
    public function unlikePost($request)
    {
        $this->postDao->unlikePost($request);
    }

    /**
     * To show personal post list
     * @param Request $request
     * @return postList personal post list
     */
    public function getPersonalPostList($request)
    {
        return $this->postDao->getPersonalPostList($request);
    }

    /**
     * To recover post by id
     * @param string $id post id
     * @return Object $post recovered post
     */
    public function recoverPostById($id) {
        return $this->postDao->recoverPostById($id);
    }
}
