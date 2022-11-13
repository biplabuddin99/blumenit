<?php

namespace App\Http\Requests\HeadersupportRequest;

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
            'title1' => 'required',
            'details1' => 'required',
            'image1' => 'required',
            'title2' => 'required',
            'details2' => 'required',
            'image2' => 'required',
            'title3' => 'required',
            'details3' => 'required',
            'image3' => 'required',
            'title4' => 'required',
            'details4' => 'required',
            'image4' => 'required',
            'title5' => 'required',
            'details5' => 'required',
            'image5' => 'required',
        ];
    }

    public function messages(){
        return [
            'required' => 'The :attribute field is required'
        ];
    }
}
