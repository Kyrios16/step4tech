<?php 
    namespace App\Contracts\Dao\User;

    interface UserDaoInterface
    {
        public function storeUserInfo($request);

        public function getUserById($id);

        public function update($request, $id);

        public function changeUserPassword($request);

    }