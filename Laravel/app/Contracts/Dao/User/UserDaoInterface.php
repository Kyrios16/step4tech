<?php

namespace App\Contracts\Dao\User;

use Illuminate\Http\Request;

/**
 * Interface of Data Access Object for user
 */
interface UserDaoInterface
{
    /**
     * To get user by id
     * @param string $id user id
     * @return Object $user user object
     */
    public function getUserById($id);
}
