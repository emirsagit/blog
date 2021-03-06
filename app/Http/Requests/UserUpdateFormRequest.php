<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateFormRequest extends FormRequest
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
            'email' => [
                'email',
                'required',
                Rule::unique('users')->ignore(request()->user)
            ],
            'name' => 'required|min:3|string',
            'thumbnail' => 'nullable|max:1999',
            'tel' => 'numeric|nullable|min:10'
        ];
    }
}
