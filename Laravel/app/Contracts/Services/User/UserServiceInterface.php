<?php 
    namespace App\Contracts\Services\User;

    interface UserServiceInterface
    {
        public function getUserById($id);

        public function update($request, $id);

        public function changeUserPassword($request);

        public function getUserList();
    }