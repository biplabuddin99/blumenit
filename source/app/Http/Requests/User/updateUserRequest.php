<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class updateUserRequest extends FormRequest
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
            'name' => 'required|string',
            'username' => 'required|string|unique:users,username,'.$this->id,
            'contact' => 'required|numeric|unique:users,contact,'.$this->id,
            'email' => 'required|email|unique:users,email,'.$this->id
        ];
    }

    public function messages()
    {
        return [
            'required' => 'The :attribute field is required.',
        ];
    }
}
