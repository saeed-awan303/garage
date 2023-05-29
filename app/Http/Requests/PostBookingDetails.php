<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostBookingDetails extends FormRequest
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
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required',
            'work_details' => 'required',
            'street_address_1'=>'required',
            'street_address_2'=>'required',
            'city'=>'required',
            'phone_number'=>'required',
            'seller_name'=>'required',
            'seller_phone_number'=>'required',
            'car_registration_number'=>'required',
        ];
    }
}
