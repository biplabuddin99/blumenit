<?php

namespace App\Http\Requests\Manufacturer;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Http\Request;

class CreateRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'address' => 'required',
            'image' => 'required',
        ];
    }

    public function messages(){
        return [
            'required' => 'The :attribute field is required'
        ];
    }
}
