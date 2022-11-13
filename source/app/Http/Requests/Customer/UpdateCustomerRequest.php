<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCustomerRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'contact' => 'required',
            'contact_ext' => 'required',
            'email' => [
                'required', 
                Rule::unique('customers')
                        ->ignore($this->id)
                        ->where('contact_ext', $this->contact_ext)
                        ->where('contact', $this->contact)
               ]
        ];
    }

    public function messages(){
        return [
            'required' => 'The :attribute field is required',
            'unique' => 'This email address and contact number is already used.'.$this->id
        ];
    }
}