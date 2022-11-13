<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Factory as ValidationFactory;
use Illuminate\Validation\Rule;

class SignUpRequest extends FormRequest
{
    public function __construct(ValidationFactory $validationFactory)
    {

        $validationFactory->extend(
            'contact_valid',
            function ($attribute, $value, $parameters) {
                if(count(explode('-',$this->contact)) > 1)
                    return true;
                else
                    return false;
            },
            'Your Mobile number format is not correct! Its should be +xxx-xxxxxxxxx'
        );

    }
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
        /*return [
            'contact_ext' => 'required',
            'contact' => 'required',
            'email' => [
                'required', 
                Rule::unique('customers')
                       ->where('contact_ext', $this->contact_ext)
                       ->where('contact', $this->contact)
               ]
        ];*/
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'contact' => 'required|contact_valid',
            'email' => [
                'required', 
                Rule::unique('customers')
                       ->where('contact_ext', explode('-',$this->contact)[0])
                       ->where('contact', isset(explode('-',$this->contact)[1])?explode('-',$this->contact)[1]:explode('-',$this->contact)[0])
               ]
        ];
    }

    public function messages(){
        return [
            'required' => 'The :attribute field is required',
            'unique' => 'This email address and contact number is already used.'
        ];
    }
}