<?php

namespace App\Contracts\Dao\User;

/**
 * Interface of Data Access Object for User
 */
interface UserDaoInterface
{
    /**
     * To get users list
     * @return users list
     */
    public function getUserList();

    /**
     * To count total number of users
     * 
     */
    public function countTotalUsers();

    /**
     * To delete user
     * 
     * @param $id user id
     */
    public function deleteUser($id);
}
