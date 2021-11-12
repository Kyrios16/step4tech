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

    /**
     * To search post list
     * @return postList searched post list
     */
    public function searchPost($searchValue) {
        $postList = DB::select(DB::raw("SELECT users.name, users.profile_img, posts.created_at, posts.title, GROUP_CONCAT(categories.name) AS post_categories
                                        FROM users, posts, categories, post_category
                                        WHERE users.id = posts.created_user_id
                                        AND posts.id = post_category.post_id
                                        AND categories.id = post_category.category_id
                                        AND (
                                            users.name LIKE :userSearchValue OR
                                            posts.title LIKE :postSearchValue OR
                                            categories.name LIKE :categorySearchValue)
                                        GROUP BY posts.id
                                        ORDER BY posts.updated_at DESC"), array(
                                        'userSearchValue' => '%' . $searchValue . '%',
                                        'postSearchValue' => '%' . $searchValue . '%',
                                        'categorySearchValue' => '%' . $searchValue . '%'
                                        ));
        return $postList;
    }
}