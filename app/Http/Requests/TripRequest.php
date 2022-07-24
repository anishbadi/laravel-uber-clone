<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TripRequest extends FormRequest
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
            'customer_id' => 'required|exists:customers,id',
            'from_location_id' => 'required|exists:locations,id',
            'to_location_id' => 'required|exists:locations,id',
        ];
    }

     /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'customer_id.required' => 'Customer is required',
            'customer_id.exists' => 'Customer not found',
            'from_location_id.required' => 'Start location is required',
            'from_location_id.exists' => 'Location not found',
            'to_location_id.required' => 'Destination is required',
            'to_location_id.exists' => 'Location not found',
        ];
    }
}
