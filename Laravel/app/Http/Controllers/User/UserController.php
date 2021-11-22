<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserEditRequest;
use App\Contracts\Services\User\UserServiceInterface;
use App\Http\Requests\UserPasswordChangeRequest;
use Illuminate\Support\Facades\Auth;
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
        //$user = $this->userInterface->changeUserPassword($validated);
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
}
