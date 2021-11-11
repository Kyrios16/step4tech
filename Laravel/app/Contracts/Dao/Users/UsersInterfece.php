<?php 
    namespace App\Contracts\Dao\Users;

    interface UsersInterface
    {
        public function store($request);

        public function getUser($id);

        public function update($request, $id);
    }