<?php

namespace App\Dao\User;

use App\Contracts\Dao\User\UserDaoInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserDao implements UserDaoInterface
{
    /**
     * To get user by id
     * @param string $id user id
     * @return Object $user user object
     */
    public function getUserById($id)
    {
        $user = User::findOrFail($id);
        return $user;
    }

    /**
     * To get user list
     * @return array $userList list of users
     */
    public function getUserList()
    {
        $userlist = User::orderBy('created_at', 'asc')->get();
        return $userlist;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function updateUser($request)
    {
        $user = User::find(Auth::user()->id);

        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->bio = $request['bio'];
        $user->github = $request['github'];
        $user->linkedin = $request['linkedin'];
        $user->date_of_birth = $request['date_of_birth'];
        $user->ph_no = $request['ph_no'];
        $user->position = $request['position'];
        $user->role = 1;
        $user->created_user_id = Auth::user()->id;
        $user->updated_user_id = Auth::user()->id;

        if ($cover_img = $request->hasFile('cover_img')) {
            $cover_img = $request->file('cover_img');
            $destinationPath = public_path() . '/images/cover';
            $newcover = "cover_" . date('YmdHis') . "." . $cover_img->getClientOriginalExtension();
            $cover_img->move($destinationPath, $newcover);
            $user->cover_img = $newcover;
        }
        if ($cover_img = $request->hasFile('profile_img')) {
            $profile_img = $request->file('profile_img');
            $destinationPath = public_path() . '/images/profile';
            $newProfile = "profile_" . date('YmdHis') . "." . $profile_img->getClientOriginalExtension();
            $profile_img->move($destinationPath, $newProfile);
            $user->profile_img = $newProfile;
        }
        $user->save();
        return $user;
    }

    /**
     * To change user password
     * @param array $validated Validated values from request
     * @return Object $user user object
     */
    public function changeUserPassword($validated)
    {
        $user = User::find(auth()->user()->id)
            ->update([
                'password' => Hash::make($validated['new_password']),
                'updated_user_id' => Auth::user()->id
            ]);
        return $user;
    }

    /**
     * To get most popular user
     * 
     * @return $mostPopularUser most popular user
     */
    public function getMostPopularUser()
    {
        $mostPopularUser = DB::select(DB::raw(
            'SELECT
                    COUNT(votes.post_id) totalLike,
                    posts.title,
                    users.*
                FROM
                    users
                    LEFT JOIN posts on posts.created_user_id = users.id
                    LEFT JOIN votes ON votes.post_id = posts.id
                GROUP BY
                    votes.post_id, users.id, posts.id
                ORDER BY
                    totalLike DESC
                LIMIT
                    1'
        ));

        return $mostPopularUser;
    }
}
