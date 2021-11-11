<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|max:255',
            'profile_img' => 'required|image|max:2048',
            'cover_img' => 'required|image|max:2048',
            'github' => 'nullable|max:255',
            'linkedin' => 'nullable|max:255',
            'bio' => 'required|max:255',
            'date_of_birth' => 'required|date',
            'ph_no' => 'nullable|max:255',
            'position' => 'required|max:255',
        ];
    }
}
