<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
            'username' => [
                'required', 
                'max:25', 
                'min:3', 
                Rule::unique('users')->ignore($this->user->id)
            ],
            'password' => ['max:20'],
            'avatar' => [
                'mimes:jpeg,png,jpg'
            ]
        ];
    }
}
