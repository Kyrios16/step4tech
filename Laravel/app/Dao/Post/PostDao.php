<?php

namespace App\Dao\Post;

use App\Models\Post;
use App\Contracts\Dao\Post\PostDaoInterface;
use Illuminate\Support\Facades\DB;

/**
 * Data accessing object for post
 */
class PostDao implements PostDaoInterface
{
    /**
     * To get post list for intial view
     * @return postList
     */
    public function getPostListForInitial() {
        $postList = DB::select(DB::raw("SELECT users.name, users.profile_img, posts.created_at, posts.title, GROUP_CONCAT(categories.name) AS post_categories
                                        FROM users, posts, categories, post_category
                                        WHERE users.id = posts.created_user_id
                                        AND posts.id = post_category.post_id
                                        AND categories.id = post_category.category_id
                                        GROUP BY posts.id
                                        ORDER BY posts.updated_at DESC"));
        return $postList;
    }
}