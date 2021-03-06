<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTrip extends FormRequest
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
            'start'=>'required|date',
            'passengers'=>'required|array',
            'end'=>'required|date|after:start',
            'passengers.*.last_name'=>'required',
            'passengers.*.first_name'=>'required',
            'passengers.*.national_code'=>'required|size:10'
        ];
    }
}
