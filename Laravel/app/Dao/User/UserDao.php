<?php

namespace App\Dao\User;

use App\Contracts\Dao\User\UserDaoInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserDao implements UserDaoInterface
{
    public function getUserById($id)
    {
        $user = User::findOrFail($id);
        return $user;
    }

    public function getUserList()
    {
        $userlist = User::orderBy('created_at', 'asc')->get();
        return $userlist;
    }

    public function update($request, $id)
    {
        $user = User::find(Auth::user()->id);
        if ($cover_img = $request->hasFile('cover_img')) {
            $cover_img = $request->file('cover_img');
            $destinationPath = public_path() . '/cover';
            $newcover = "cover_" . date('YmdHis') . "." . $cover_img->getClientOriginalExtension();
            $cover_img->move($destinationPath, $newcover);
        }
        if ($profile_img = $request->hasFile('profile_img')) {
            $profile_img = $request->file('profile_img');
            $destinationPath = public_path() . '/profile';
            $newProfile = "profile_" . date('YmdHis') . "." . $profile_img->getClientOriginalExtension();
            $profile_img->move($destinationPath, $newProfile);
        }
        $user->cover_img = $newcover;
        $user->profile_img = $newProfile;
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
        $user->created_user_id = Auth::user()->id;
        $user->updated_user_id = Auth::user()->id;
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
}
