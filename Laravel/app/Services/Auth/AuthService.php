<?php

namespace App\Services\Auth;

use App\Contracts\Services\Auth\AuthServiceInterface;
use App\Contracts\Dao\Auth\AuthDaoInterface;

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
    public function saveUser($request)
    {
        return $this->authDao->saveUser($request);
    }
}
