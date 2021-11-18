<?php

namespace App\Dao\User;

use App\Contracts\Dao\User\UserDaoInterface;
use App\Models\User;

/**
 * Data Access Object for User
 */
class UserDao implements UserDaoInterface
{
    /**
     * To get user by id
     * @param string $id user id
     * @return Object $user user object
     */
    public function getUserById($id)
    {
        $user = User::find($id);
        return $user;
    }
}
