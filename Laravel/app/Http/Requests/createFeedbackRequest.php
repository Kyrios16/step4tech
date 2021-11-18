<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createFeedbackRequest extends FormRequest
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
            'content' => 'required',
            'photo' => 'image|max:2048',
        ];
    }
    /**
     * Custom Message for Validation
     *
     * @return array
     */
    public function messages()
    {
        return [

            'photo.image' => 'Upload file must be image type.',
        ];
    }
}
