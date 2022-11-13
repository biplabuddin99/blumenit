<?php

namespace App\Http\Requests\FootersupportRequest;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Http\Request;

class UpdateRequest extends FormRequest
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
        $id=Request::instance()->id;
        return [
            'title1' => 'required',
            'details1' => 'required',
            'title2' => 'required',
            'details2' => 'required',
            'title3' => 'required',
            'details3' => 'required',
            'title4' => 'required',
            'details4' => 'required',
        ];
    }

    public function messages(){
        return [
            'required' => 'The :attribute field is required',
        ];
    }
}
