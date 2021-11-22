<?php

namespace App\Dao\Post;

use App\Models\Post;
use App\Contracts\Dao\Post\PostDaoInterface;
use App\Models\PostCategory;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Data accessing object for post
 */
class PostDao implements PostDaoInterface
{
    /**
     * To get post list for intial view
     * @param Request $request
     * @return postList
     */
    public function getPostListForInitial($request)
    {
        if($request->userId == '') {
            $postList = DB::select(DB::raw("SELECT posts.id, users.name, users.profile_img, posts.created_at, posts.title, users.id AS userId,
                                            GROUP_CONCAT(DISTINCT categories.name) AS post_categories,
                                            GROUP_CONCAT(DISTINCT votes.user_id) AS post_voted_userid,
                                            COUNT(DISTINCT feedbacks.id) AS no_of_feedbacks
                                            FROM posts
                                            LEFT JOIN votes ON (votes.post_id = posts.id)
                                            LEFT JOIN feedbacks ON (feedbacks.post_id = posts.id)
                                            INNER JOIN users ON (users.id = posts.created_user_id) 
                                            INNER JOIN post_category ON (post_category.post_id = posts.id)
                                            INNER JOIN categories ON (categories.id = post_category.category_id)
                                            WHERE posts.deleted_at IS NULL
                                            AND votes.deleted_at IS NULL
                                            AND feedbacks.deleted_at IS NULL
                                            AND users.deleted_at IS NULL
                                            AND post_category.deleted_at IS NULL
                                            AND categories.deleted_at IS NULL
                                            GROUP BY posts.id
                                            ORDER BY posts.updated_at DESC"));
        }
        else {
            $user_category_names = DB::select(DB::raw("SELECT categories.name FROM categories, user_category
                                                WHERE categories.id = user_category.category_id
                                                AND user_category.deleted_at IS NULL
                                                AND user_category.user_id = :userId"), array("userId" => $request->userId));
            $mysql = "SELECT posts.id, users.name, users.profile_img, posts.created_at, posts.title, users.id AS userId,
                    GROUP_CONCAT(DISTINCT categories.name) AS post_categories,
                    GROUP_CONCAT(DISTINCT votes.user_id) AS post_voted_userid,
                    COUNT(DISTINCT feedbacks.id) AS no_of_feedbacks
                    FROM posts
                    LEFT JOIN votes ON (votes.post_id = posts.id)
                    LEFT JOIN feedbacks ON (feedbacks.post_id = posts.id)
                    INNER JOIN users ON (users.id = posts.created_user_id) 
                    INNER JOIN post_category ON (post_category.post_id = posts.id)
                    INNER JOIN categories ON (categories.id = post_category.category_id)
                    WHERE posts.deleted_at IS NULL
                    AND votes.deleted_at IS NULL
                    AND feedbacks.deleted_at IS NULL
                    AND users.deleted_at IS NULL
                    AND post_category.deleted_at IS NULL
                    AND categories.deleted_at IS NULL
                    GROUP BY posts.id";
            if(count($user_category_names) > 0) {
                $mysql .= " ORDER BY CASE post_categories WHEN";
                $no_of_category = 0;
                foreach($user_category_names as $user_category_name) {
                    if($no_of_category == 0) {
                        $mysql .= " post_categories LIKE '%" . $user_category_name->name . "%'";
                    }
                    else {
                        $mysql .= " OR post_categories LIKE '%" . $user_category_name->name . "%'";
                    }
                    $no_of_category++;
                }
                $mysql .= " THEN 0 ELSE 1 END DESC, posts.updated_at DESC";
            }
            else {
                $mysql .= " ORDER BY posts.updated_at DESC";
            }
            
            $postList = DB::select(DB::raw($mysql));
        }
        
        return $postList;
    }

    /**
     * To show liked post list
     * @param Request $request
     * @return postList liked post list
     */
    public function getLikedPostList($request)
    {
        $postList = DB::select(DB::raw("SELECT posts.id, users.name, users.profile_img, posts.created_at, posts.title, users.id AS userId,
                                        GROUP_CONCAT(DISTINCT categories.name) AS post_categories,
                                        GROUP_CONCAT(DISTINCT votes.user_id) AS post_voted_userid,
                                        COUNT(DISTINCT feedbacks.id) AS no_of_feedbacks
                                        FROM posts
                                        LEFT JOIN votes ON (votes.post_id = posts.id)
                                        LEFT JOIN feedbacks ON (feedbacks.post_id = posts.id)
                                        INNER JOIN users ON (users.id = posts.created_user_id) 
                                        INNER JOIN post_category ON (post_category.post_id = posts.id)
                                        INNER JOIN categories ON (categories.id = post_category.category_id)
                                        INNER JOIN votes AS v ON (v.post_id = posts.id AND v.user_id = :userId)
                                        WHERE posts.deleted_at IS NULL
                                        AND votes.deleted_at IS NULL
                                        AND feedbacks.deleted_at IS NULL
                                        AND users.deleted_at IS NULL
                                        AND post_category.deleted_at IS NULL
                                        AND categories.deleted_at IS NULL
                                        GROUP BY posts.id
                                        ORDER BY posts.updated_at DESC"), array('userId' => $request->userId));
        return $postList;
    }

    /**
     * To show deleted post list
     * @param Request $request
     * @return postList deleted post list
     */
    public function getDeletedPostList($request)
    {
        $postList = DB::select(DB::raw("SELECT posts.id, users.name, users.profile_img, posts.created_at, posts.title, users.id AS userId,
                                        GROUP_CONCAT(DISTINCT categories.name) AS post_categories,
                                        GROUP_CONCAT(DISTINCT votes.user_id) AS post_voted_userid,
                                        COUNT(DISTINCT feedbacks.id) AS no_of_feedbacks
                                        FROM posts
                                        LEFT JOIN votes ON (votes.post_id = posts.id)
                                        LEFT JOIN feedbacks ON (feedbacks.post_id = posts.id)
                                        INNER JOIN users ON (users.id = posts.created_user_id) 
                                        INNER JOIN post_category ON (post_category.post_id = posts.id)
                                        INNER JOIN categories ON (categories.id = post_category.category_id)
                                        INNER JOIN users AS u ON (u.id = posts.created_user_id AND u.id = :userId)
                                        WHERE posts.deleted_at IS NOT NULL
                                        AND votes.deleted_at IS NULL
                                        AND feedbacks.deleted_at IS NULL
                                        AND users.deleted_at IS NULL
                                        AND post_category.deleted_at IS NULL
                                        AND categories.deleted_at IS NULL
                                        GROUP BY posts.id
                                        ORDER BY posts.updated_at DESC"), array('userId' => $request->userId));
        return $postList;
    }

    /**
     * To search post list
     * @return postList searched post list
     */
    public function searchPost($searchValue)
    {
        $postList = DB::select(DB::raw("SELECT * FROM
                                        ((SELECT posts.id, users.name, users.profile_img, posts.created_at, posts.updated_at, posts.title,
                                        users.id AS userId,
                                        GROUP_CONCAT(DISTINCT categories.name) AS post_categories,
                                        GROUP_CONCAT(DISTINCT votes.user_id) AS post_voted_userid,
                                        COUNT(DISTINCT feedbacks.id) AS no_of_feedbacks
                                        FROM posts
                                        LEFT JOIN votes ON (votes.post_id = posts.id)
                                        LEFT JOIN feedbacks ON (feedbacks.post_id = posts.id)
                                        INNER JOIN users ON (users.id = posts.created_user_id) 
                                        INNER JOIN post_category ON (post_category.post_id = posts.id)
                                        INNER JOIN categories ON (categories.id = post_category.category_id)
                                        WHERE posts.deleted_at IS NULL
                                        AND votes.deleted_at IS NULL
                                        AND feedbacks.deleted_at IS NULL
                                        AND users.deleted_at IS NULL
                                        AND post_category.deleted_at IS NULL
                                        AND categories.deleted_at IS NULL
                                        GROUP BY posts.id
                                        HAVING post_categories LIKE :categorySearchValue)
                                        UNION
                                        (SELECT posts.id, users.name, users.profile_img, posts.created_at, posts.updated_at, posts.title,
                                        users.id AS userId,
                                        GROUP_CONCAT(DISTINCT categories.name) AS post_categories,
                                        GROUP_CONCAT(DISTINCT votes.user_id) AS post_voted_userid,
                                        COUNT(DISTINCT feedbacks.id) AS no_of_feedbacks
                                        FROM posts
                                        LEFT JOIN votes ON (votes.post_id = posts.id)
                                        LEFT JOIN feedbacks ON (feedbacks.post_id = posts.id)
                                        INNER JOIN users ON (users.id = posts.created_user_id) 
                                        INNER JOIN post_category ON (post_category.post_id = posts.id)
                                        INNER JOIN categories ON (categories.id = post_category.category_id)
                                        WHERE posts.deleted_at IS NULL
                                        AND votes.deleted_at IS NULL
                                        AND feedbacks.deleted_at IS NULL
                                        AND users.deleted_at IS NULL
                                        AND post_category.deleted_at IS NULL
                                        AND categories.deleted_at IS NULL
                                        AND (users.name LIKE :userSearchValue
                                        OR posts.title LIKE :postSearchValue)
                                        GROUP BY posts.id)) AS result
                                        ORDER BY result.updated_at DESC"), array(
                                        'categorySearchValue' => '%' . $searchValue . '%',
                                        'userSearchValue' => '%' . $searchValue . '%',
                                        'postSearchValue' => '%' . $searchValue . '%',
            
        ));
        return $postList;
    }

    /**
     * To save post
     * @param Request $request request with inputs
     * @return Object $post saved post
     */
    public function savePost(Request $request)
    {
        $postList = DB::table("posts")
            ->get();
        $postid = count($postList) + 1;
        $post = new Post();

        if ($file = $request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $newName = "image_" . $postid . "." . $extension;
            $destinationPath = public_path() . '/images/posts/';
            $file->move($destinationPath, $newName);
            $post->photo = $newName;
        }
        $post->title = $request['title'];
        $post->content = $request['content'];
        $post->created_user_id = Auth::user()->id ?? 1;
        $post->updated_user_id = Auth::user()->id ?? 1;
        $post->save();
        info($request['category']);
        foreach ($request['category'] as $category) {
            $postCategory = new PostCategory();
            $postCategory->post_id = $postid;
            $postCategory->category_id = $category;
            $postCategory->save();
        }
        return $post;
    }
    /**
     * To get post by id
     * @param string $id post id
     * @return Object $post post object
     */
    public function getPostById($id)
    {
        $postList = post::join('users', 'users.id', '=', 'posts.created_user_id')
            ->whereNull('posts.deleted_at')
            ->where('posts.id', $id)
            ->get(['posts.*', 'users.profile_img', 'users.name']);
        $post = $postList[0];
        return $post;
    }

    /**
     * To update post by id
     * @param Request $request request with inputs
     * @param string $id post id
     * @return Object $post post Object
     */
    public function updatedPostById(Request $request, $id)
    {
        $post = post::find($id);
        if ($file = $request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $newName = "image_" . $id . "." . $extension;
            $destinationPath = public_path() . '/images/posts/';
            $file->move($destinationPath, $newName);
            $post->photo = $newName;
        }
        $post->title = $request['title'];
        $post->content = $request['content'];
        $post->created_user_id = Auth::user()->id ?? 1;
        $post->updated_user_id = Auth::user()->id ?? 1;
        $post->save();
        $deletedUserId =  Auth::user()->id ?? 1;
        $postCateList = PostCategory::where('post_id', $id)->get();
        if ($postCateList) {
            foreach ($postCateList as $postCate) {
                $postCate->save();
                $postCate->delete();
            }
        }
        foreach ($request['category'] as $category) {
            $post_category = DB::insert('INSERT into post_category (post_id, category_id) VALUES (?, ?)', [$id, $category]);
        }

        return $post;
    }
    /**
     * To delete post by id
     * @param string $id post id
     * @return string $message message success or not
     */
    public function deletePostById($id)
    {
        $post = Post::find($id);
        if ($post) {
            $post->deleted_user_id = Auth::user()->id ?? 1;
            $post->deleted_at = now();
            $post->save();
        }
        return $post;
    }

    /**
     *  To get all posts list
     * 
     * @return $posts posts list
     */
    public function getPostList()
    {
        $posts = Post::orderBy('id')->get();
        return $posts;
    }

    /**
     * To count total posts 
     * 
     * @return return number of posts
     */
    public function countTotalPosts()
    {
        $count = Post::where('deleted_at', null)->count();
        return $count;
    }

    /**
     * To get max likes on post
     * 
     * @return return max likes on post
     */
    public function getMaxLikes()
    {
        $count = DB::table('votes')
            ->select(DB::raw('count(post_id) as totalLikes'))
            ->where('user_id', '!=', '')
            ->groupBy('post_id')
            ->orderBy('totalLikes', 'desc')
            ->first();

        return $count;
    }

    /**
     * To like post
     * @param Request $request
     * @return Object $vote
     */
    public function likePost($request)
    {
        $vote = new Vote();
        $vote->user_id = $request->userId;
        $vote->post_id = $request->postId;
        $vote->save();
        return $vote;
    }

    /**
     * To unlike post
     * @param Request $request
     * @return 
     */
    public function unlikePost($request)
    {
        info($request);
        $votes = Vote::where('user_id', $request->userId)
            ->where('post_id', $request->postId)->delete();
    }

    /**
     * To show personal post list
     * @param Request $request
     * @return postList personal post list
     */
    public function getPersonalPostList($request)
    {
        $postList = DB::select(DB::raw("SELECT posts.id, users.name, users.profile_img, posts.created_at, posts.title, users.id AS userId,
                                        GROUP_CONCAT(DISTINCT categories.name) AS post_categories,
                                        GROUP_CONCAT(DISTINCT votes.user_id) AS post_voted_userid,
                                        COUNT(DISTINCT feedbacks.id) AS no_of_feedbacks
                                        FROM posts
                                        LEFT JOIN votes ON (votes.post_id = posts.id)
                                        LEFT JOIN feedbacks ON (feedbacks.post_id = posts.id)
                                        INNER JOIN users ON (users.id = posts.created_user_id) 
                                        INNER JOIN post_category ON (post_category.post_id = posts.id)
                                        INNER JOIN categories ON (categories.id = post_category.category_id)
                                        INNER JOIN users AS u ON (u.id = posts.created_user_id AND u.id = :userId)
                                        WHERE posts.deleted_at IS NULL
                                        AND votes.deleted_at IS NULL
                                        AND feedbacks.deleted_at IS NULL
                                        AND users.deleted_at IS NULL
                                        AND post_category.deleted_at IS NULL
                                        AND categories.deleted_at IS NULL
                                        GROUP BY posts.id
                                        ORDER BY posts.updated_at DESC"), array('userId' => $request->userId));
        return $postList;
    }

    /**
     * To recover post by id
     * @param string $id post id
     * @return Object $post recovered post
     */
    public function recoverPostById($id)
    {
        $post = Post::withTrashed()->find($id)->restore();
        return $post;
    }
}
