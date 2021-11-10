<?php

namespace App\Dao\Post;

use App\Models\Post;
use App\Contracts\Dao\Post\PostDaoInterface;

/**
 * Data accessing object for post
 */
class PostDao implements PostDaoInterface
{
    /**
     * To get post list order by date
     * @return postList
     */
    public function getPostListByDate() {
        $postList = Post::orderBy('updated_at', 'desc')->get();
        return $postList;
    }
}