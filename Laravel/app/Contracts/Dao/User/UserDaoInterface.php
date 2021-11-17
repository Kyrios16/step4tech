<?php 
    namespace App\Contracts\Dao\User;

    interface UserDaoInterface
    {
        public function getUserById($id);

        public function update($request, $id);

        public function getUserList();

        public function changeUserPassword($request);

    }