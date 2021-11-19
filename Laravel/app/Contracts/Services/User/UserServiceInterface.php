<?php

namespace App\Contracts\Services\User;

/**
 * Interface for Services of user
 */
interface UserServiceInterface
{
    /**
     * To get user by id
     * @param string $id user id
     * @return Object $user user object
     */
    public function getUserById($id);

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateUser($request);

    /**
     * To get user list
     * @return array $userList list of users
     */
    public function getUserList();

    /**
     * To change user password
     * @param array $validated Validated values from request
     * @return Object $user user object
     */
    public function changeUserPassword($request);

    /**
     * To count total number of users
     */
    public function countTotalUsers();

    /**
     * To delete user by id
     * 
     * @param $id user id
     */
    public function deleteUserById($id);

    /**
     * To get most popular user
     * 
     * @return $mostPopularUser most popular user
     */
    public function getMostPopularUser();
}
