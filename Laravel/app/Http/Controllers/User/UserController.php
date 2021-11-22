<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserEditRequest;
use App\Contracts\Services\User\UserServiceInterface;
use App\Http\Requests\UserPasswordChangeRequest;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Mail;


class UserController extends Controller
{
    private $userInterface;
    public function __construct(UserServiceInterface $userServiceInterface)
    {
        $this->userInterface = $userServiceInterface;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        $viewUser = $this->userInterface->getUserById($id);
        $title = "View Profile";
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $user = $this->userInterface->getUserById($userId);
            return view('User.user-view', compact('viewUser', 'title', 'user'));
        } else {
            return view('User.user-view', compact('viewUser', 'title'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showUserEditView()
    {
        $userId = Auth::user()->id;
        $user = $this->userInterface->getUserById($userId);
        $title = "Edit Profile";
        return view('User.update-user', compact('user', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function submitUserEditView(Request $request)
    {
        $user = $this->userInterface->updateUser($request);
        return redirect('/user/view/' . $user->id);
    }

    /**
     * To Show the application dashboard.
     *
     * @return View change password view
     */
    public function showChangePasswordView()
    {
        $userId = Auth::user()->id;
        $title = "Change Password";
        $user = $this->userInterface->getUserById($userId);
        return view('User.change-password',compact('user','title'));
    }

    /**
     * To Show the application dashboard.
     * @param UserPasswordChangeRequest $request request for password change
     * @return View user profile
     */
    public function changePassword(UserPasswordChangeRequest $request)
    {
        // validation for request values
        $validated = $request->validated();
        $user = $this->userInterface->changeUserPassword($validated);
        $authuser = User::find(auth()->user()->id);
        $email = $authuser->email;
        $data = [
            'subject' => 'Password Changed Confirmation',
            'email' => $email,
            'content' => 'Password Changed Successfully'
        ];

        Mail::send('password-mail', $data, function ($message) use ($data) {
            $message->to($data['email'])
                ->subject($data['subject']);
        });
        return redirect('/');
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
    public function deleteUserById($id)
    {
        $this->userInterface->deleteUserById($id);
        return redirect('/admin/users');
    }

    /**
     * To get most popular user
     * 
     * @return $mostPopularUser most popular user
     */
    public function getMostPopularUser()
    {
        $mostPopularUser = $this->userInterface->getMostPopularUser();

        return view('admin.analytic.analytics-manage', compact('mostPopularUser'));
    }

    /**
     * To export users list form table
     * 
     * @return excel file donwloaded
     */
    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function showUserProfile($id)
    {
        $user = $this->userInterface->getUserById($id);
        return view('User.user-view', compact('user'));
    }
}
