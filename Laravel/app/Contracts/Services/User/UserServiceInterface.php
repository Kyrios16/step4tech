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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateUser($request);

    public function changeUserPassword($request);

    public function getUserList();
}
