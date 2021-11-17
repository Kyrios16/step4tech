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
        public function getUserById($id){
            return $this->userDao->getUserById($id);
        }

        public function getUserList(){

            return $this->userDao->getUserList();
        }

        public function update($request, $id){
            return $this->userDao->update($request,$id);
        }

        public function changeUserPassword($request)
        {
            return $this->userDao->changeUserPassword($request);
        }
    }