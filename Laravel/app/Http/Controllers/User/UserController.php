<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Contracts\Services\User\UserServiceInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    private $userInterface;

    /**
     * Class Constructor
     * 
     * @param UserServiceInterface
     */
    public function __construct(UserServiceInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    /**
     * To show users list
     * 
     * @return users-manage blade with users list
     */
    public function index()
    {
        $users = $this->userInterface->getUserList();
        return view('admin.User.users-manage', compact('users'));
    }

    /**
     * To count total number of users
     * 
     * @return Analytics blade with number of users
     */
    public function countTotalUsers()
    {
        $numTotalUsers =  $this->userInterface->countTotalUsers();
        return response()->json($numTotalUsers);
    }

    /**
     * To delete user by id
     * 
     * @return redirect url
     */
    public function deleteUser($id)
    {
        $this->userInterface->deleteUser($id);
        return redirect('/admin/users');
    }
}
