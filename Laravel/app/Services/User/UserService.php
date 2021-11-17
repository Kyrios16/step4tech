<?php

namespace App\Services\User;

use App\Contracts\Dao\User\UserDaoInterface;
use App\Contracts\Services\User\UserServiceInterface;

class UserService implements UserServiceInterface
{
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateUser($request)
    {
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
}
