<?php

namespace App\Services\Auth;

use App\Contracts\Services\Auth\AuthServiceInterface;
use App\Contracts\Dao\Auth\AuthDaoInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthService implements AuthServiceInterface
{
    private $authDao;

    /**
     * Class Constructor
     * 
     * @param AuthDaoInterface
     */
    public function __construct(AuthDaoInterface $authDaoInterface)
    {
        $this->authDao = $authDaoInterface;
    }
    /**
     * To Save User with values from request
     * @param Request $request request including inputs
     * @return Object created user object
     */
    public function saveUser(Request $request)
    {
        $userlist = DB::table("users")->get();
        $userid = count($userlist) + 1;
        if ($cover_img = $request->hasFile('cover_img')) {
            $cover_img = $request->file('cover_img');
            $newcover = "cover_" . $userid . "." . $cover_img->getClientOriginalExtension();
            $request->cover_img = $newcover;
        } else {
            $request->cover_img = 'cover_default.png';
        }
        if ($profile_img = $request->hasFile('profile_img')) {
            $profile_img = $request->file('profile_img');
            $newProfile = "profile_" . $userid . "." . $profile_img->getClientOriginalExtension();
            $request->profile_img = $newProfile;
        } else {
            $request->profile_img = 'profile_default.png';
        }
        return $this->authDao->saveUser($request);
    }
}
