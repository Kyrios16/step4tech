<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserEditRequest;
use App\Contracts\Services\User\UserServiceInterface;
use App\Http\Requests\UserPasswordChangeRequest;
use App\Models\User;


class UserController extends Controller
{
    private $userInterface;
    public function __construct(UserServiceInterface $userServiceInterface)
    {
        //$this->middleware('Auth');
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
        $user = $this->userInterface->getUserById($id);
        return view('User.user-view', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->userInterface->getUserById($id);
        return view('User.update-user', compact('user'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        $validated = $request->validated();
        $user = $this->userInterface->update($request, $id);
        return view('User.profile-view-detail',compact('user'))->with('success', 'Data updated successfully');
    }
    
    /**
     * To Show the application dashboard.
     *
     * @return View change password view
     */
    public function showChangePasswordView($id)
    {
        $user = $this->userInterface->getUserById($id);
        return view('User.change-password',compact('user'));
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
        return redirect()->route('login');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
