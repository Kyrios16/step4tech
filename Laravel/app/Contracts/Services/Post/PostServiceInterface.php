<?php

namespace App\Contracts\Services\Post;
use Illuminate\Http\Request;

/**
 * Interface for post service
 */
interface PostServiceInterface
{
    /**
     * To get post list order by date
     * @return postList
     */
    public function getPostListByDate();
}