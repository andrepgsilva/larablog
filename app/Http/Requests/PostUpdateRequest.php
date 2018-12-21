<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
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
            'title' => [
                'min:3', 
                'max:255', 
                'required',
                Rule::unique('posts')->ignore($this->post->id)
            ],
            'article' => ['required'],
            'tag' => ['min:2, required, max:255']
        ];
    }
}
