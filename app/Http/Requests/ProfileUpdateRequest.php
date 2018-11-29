<?php

namespace App\Http\Requests;

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
                Rule::unique('posts')->ignore($this->user->id)
            ],
            'password' => [
                'required', 
                'min:6',
                'max:20'
            ]
        ];
    }
}
