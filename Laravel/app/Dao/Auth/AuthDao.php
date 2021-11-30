<?php

namespace App\Dao\Auth;

use App\Contracts\Dao\Auth\AuthDaoInterface;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthDao implements AuthDaoInterface
{
    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function saveUser($request)
    {
        $userlist = DB::table("users")->get();
        $user = new User;
        $userid = count($userlist) + 1;
        if ($cover_img = $request->hasFile('cover_img')) {
            $cover_img = $request->file('cover_img');
            $destinationPath = public_path() . '/images/cover';
            $newcover = "cover_" . date('YmdHis') . "." . $cover_img->getClientOriginalExtension();
            $cover_img->move($destinationPath, $newcover);
            $user->cover_img = $newcover;
        } else {
            $user->cover_img = 'cover_default.png';
        }
        if ($profile_img = $request->hasFile('profile_img')) {
            $profile_img = $request->file('profile_img');
            $destinationPath = public_path() . '/images/profile';
            $newProfile = "profile_" . date('YmdHis') . "." . $profile_img->getClientOriginalExtension();
            $profile_img->move($destinationPath, $newProfile);
            $user->profile_img = $newProfile;
        } else {
            $user->profile_img = 'profile_default.png';
        }
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->bio = $request['bio'];
        $user->github = $request['github'];
        $user->linkedin = $request['linkedin'];
        $user->date_of_birth = $request['date_of_birth'];
        $user->ph_no = $request['ph_no'];
        $user->position = $request['position'];
        $user->role = 1;
        $user->created_user_id = $userid;
        $user->updated_user_id = $userid;
        $user->save();
        return $user;
    }
}
