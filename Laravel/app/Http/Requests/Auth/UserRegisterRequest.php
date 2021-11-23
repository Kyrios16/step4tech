<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'name' => ['required', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'password_confirmation' => ['required_with:password', 'same:password', 'min:8'],
            'profile_img' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'cover_img' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'github' => ['max:255'],
            'linkedin' => ['max:255'],
            'bio' => ['max:255'],
            'date_of_birth' => ['required'],
            'ph_no' => ['max:255'],
            'position' => ['required', 'max:255'],
        ];
    }
}