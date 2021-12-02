<?php

namespace App\Services\User;

use App\Contracts\Dao\User\UserDaoInterface;
use App\Contracts\Services\User\UserServiceInterface;
use Illuminate\Support\Facades\DB;

/**
 * User Service class
 */
class UserService implements UserServiceInterface
{
    /**
     * user Dao
     */
    private $userDao;

    /**
     * Class Constructor
     * @param UserDaoInterface
     * @return
     */
    public function __construct(UserDaoInterface $userDaoInterface)
    {
        $this->userDao = $userDaoInterface;
    }

    /**
     * To get user by id
     * @param string $id user id
     * @return Object $user user object
     */
    public function getUserById($id)
    {
        return $this->userDao->getUserById($id);
    }

    /**
     * To get user list
     * @return array $userList list of users
     */
    public function getUserList()
    {
        return $this->userDao->getUserList();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateUser($request)
    {        
        $userlist =DB::table("users")->get();
        $userid = count($userlist) + 1;
        if ($cover_img = $request->hasFile('cover_img')) {
            $cover_img = $request->file('cover_img');
            $newcover = "cover_" . $userid . "." . $cover_img->getClientOriginalExtension();
            $request->cover_img = $newcover;
        }
        if ($profile_img = $request->hasFile('profile_img')) {
            $profile_img = $request->file('profile_img');
            $newProfile = "profile_" . $userid . "." . $profile_img->getClientOriginalExtension();
            $request->profile_img = $newProfile;
        }
        return $this->userDao->updateUser($request);
    }

    /**
     * To change user password
     * @param array $validated Validated values from request
     * @return Object $user user object
     */
    public function changeUserPassword($request)
    {
        return $this->userDao->changeUserPassword($request);
    }

    /**
     * To count total number of users
     * 
     * @return Analytics blade with number of users
     */
    public function countTotalUsers()
    {
        return $this->userDao->countTotalUsers();
    }

    /**
     * To delete user by id
     * 
     * @param $id user id
     * @return $user deleted user
     */
    public function deleteUserById($id)
    {
        return $this->userDao->deleteUserById($id);
    }

    /**
     * To get most popular user
     * 
     * @return $mostPopularUser most popular user
     */
    public function getMostPopularUser()
    {
        return $this->userDao->getMostPopularUser();
    }
}
