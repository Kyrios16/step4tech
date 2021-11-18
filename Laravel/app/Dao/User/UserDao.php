<?php

namespace App\Dao\User;

use App\Contracts\Dao\User\UserDaoInterface;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserDao implements UserDaoInterface
{
    /**
     * To get users list
     * @return users list
     */
    public function getUserList()
    {
        $users = User::orderBy('created_at', 'asc')->get();
        return $users;
    }

    /**
     * To count total number of users
     * 
     * @return Analytics blade with number of users
     */
    public function countTotalUsers()
    {
        $numTotalUsers =  User::where('deleted_at', null)->count();
        return $numTotalUsers;
    }

    /**
     * To delete user
     * 
     * @param $id user id
     * @return $user deleted user
     */
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->deleted_user_id = 1;
        $user->deleted_at = now();
        $user->save();
        return $user;
    }
}
