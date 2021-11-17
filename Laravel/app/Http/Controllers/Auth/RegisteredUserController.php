<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserRegisterRequest;
use App\Contracts\Services\Auth\AuthServiceInterface;

class RegisteredUserController extends Controller
{
    /**
     * Auth Interface
     */
    private $authInterface;

    /**
     * Create a new controller instance.
     * @param AuthServiceInterface $authServiceInterface
     * @return void
     */
    public function __construct(AuthServiceInterface $authServiceInterface)
    {
        //$this->middleware('auth');
        $this->authInterface = $authServiceInterface;
    }
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function viewRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function submitRegisterForm(UserRegisterRequest $request)
    {
        $validated = $request->validated();
        $user = $this->authInterface->saveUser($request);
        return view('auth.login')->with('success', 'Data added successfully');
    }
}
