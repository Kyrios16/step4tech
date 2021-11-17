<?php

namespace App\Contracts\Services\Auth;

/**
 * Interface of Data Access Object for Authentication
 */
interface AuthServiceInterface
{
    /**
     * To Save User with values from request
     * @param Request $request request including inputs
     * @return Object created user object
     */
    public function saveUser($request);
}