<?php

namespace App\Services\User;

use App\Contracts\Services\User\UserServiceInterface;
use App\Contracts\Dao\User\UserDaoInterface;

class UserService implements UserServiceInterface
{
    private $userDao;

    /**
     * Class Constructor
     * 
     * @param UserDaoInterface
     */
    public function __construct(UserDaoInterface $userDaoInterface)
    {
        $this->userDao = $userDaoInterface;
    }

    /**
     * To get users list
     * @return users list
     */
    public function getUserList()
    {
        return $this->userDao->getUserList();
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
     * To delete user
     * 
     * @param $id user id
     * @return $user deleted user
     */
    public function deleteUser($id)
    {
        return $this->userDao->deleteUser($id);
    }
}
