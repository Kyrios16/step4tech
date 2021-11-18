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
     * @return postList
     */
    public function getPostListForInitial()
    {
        $postList = DB::select(DB::raw("SELECT posts.id, users.name, users.profile_img, posts.created_at, posts.title, 
                                        GROUP_CONCAT(categories.name) AS post_categories,
                                        GROUP_CONCAT(DISTINCT votes.user_id) AS post_voted_userid
                                        FROM posts
                                        LEFT JOIN votes ON (votes.post_id = posts.id)
                                        INNER JOIN users ON (users.id = posts.created_user_id) 
                                        INNER JOIN post_category ON (post_category.post_id = posts.id)
                                        INNER JOIN categories ON (categories.id = post_category.category_id)
                                        GROUP BY posts.id
                                        ORDER BY posts.updated_at DESC"));
        return $postList;
    }

    /**
     * To search post list
     * @return postList searched post list
     */
    public function searchPost($searchValue)
    {
        $postList = DB::select(DB::raw("SELECT posts.id, users.name, users.profile_img, posts.created_at, posts.title, 
                                        GROUP_CONCAT(categories.name) AS post_categories,
                                        GROUP_CONCAT(DISTINCT votes.user_id) AS post_voted_userid
                                        FROM posts
                                        LEFT JOIN votes ON (votes.post_id = posts.id)
                                        INNER JOIN users ON (users.id = posts.created_user_id) 
                                        INNER JOIN post_category ON (post_category.post_id = posts.id)
                                        INNER JOIN categories ON (categories.id = post_category.category_id)
                                        WHERE users.name LIKE :userSearchValue
                                        OR posts.title LIKE :postSearchValue
                                        OR categories.name LIKE :categorySearchValue
                                        GROUP BY posts.id
                                        ORDER BY posts.updated_at DESC"), array(
            'userSearchValue' => '%' . $searchValue . '%',
            'postSearchValue' => '%' . $searchValue . '%',
            'categorySearchValue' => '%' . $searchValue . '%'
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
        info("inside getpostbyId");
        info($postList);
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
     * @param string $deletedUserId deleted user id
     * @return string $message message success or not
     */
    public function deletePostById($id, $deletedUserId)
    {
        $post = Post::find($id);
        if ($post) {
            $post->deleted_user_id = $deletedUserId;
            $post->save();
            $post->delete();
            return 'Deleted Successfully!';
        }
        return 'Post Not Found!';
    }

    /**
     *  To get all posts list
     * 
     * @return $posts posts list
     */
    public function getPostList()
    {
        $posts = DB::table('posts')->orderBy('id')->get();
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
}
