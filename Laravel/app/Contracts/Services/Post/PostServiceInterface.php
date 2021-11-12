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
}