<?php

namespace App\Services\User;

use App\Contracts\Dao\User\UserDaoInterface;
use App\Contracts\Services\User\UserServiceInterface;

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
    public function __construct(UserDaoInterface $userDao)
    {
        $this->userDao = $userDao;
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
}
