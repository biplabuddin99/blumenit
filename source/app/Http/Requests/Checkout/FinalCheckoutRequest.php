<?php

namespace App\Http\Requests\Checkout;

use Illuminate\Foundation\Http\FormRequest;

class FinalCheckoutRequest extends FormRequest
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
        if($this->pickup){
            return [
                'pickup' => 'required'
            ];
        }else{
            return [
                'contact_ext' => 'required',
                'contact' => 'required',
                'full_name' => 'required',
                'address' => 'required',
                'zip' => 'required',
                'country_id' => 'required',
                'state_id' => 'required',
                'city_id' => 'required',
            ];
        }
    }
}
