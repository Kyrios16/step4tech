<?php

namespace App\Contracts\Services\User;

use Illuminate\Http\Request;

/**
 * Interface for user service
 */
interface UserServiceInterface
{
    /**
     * To get user by id
     * @param string $id user id
     * @return Object $user user object
     */
    public function getUserById($id);
}
