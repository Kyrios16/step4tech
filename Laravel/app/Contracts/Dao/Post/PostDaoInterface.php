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
}