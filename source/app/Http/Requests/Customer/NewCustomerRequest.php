<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class NewCustomerRequest extends FormRequest
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
            'contact_ext' => 'required',
            'contact' => 'required',
            'email' => 'required'
        ];
    }

    public function messages(){
        return [
            'required' => 'The :attribute field is required',
            'unique' => 'The :attribute field is not unique'
        ];
    }
}