<?php

namespace App\Dao\Post;

use App\Models\Post;
use App\Contracts\Dao\Post\PostDaoInterface;
use App\Models\PostCategory;
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
    public function searchPost($searchValue)
    {
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
        $post = post::find($id);
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
}
