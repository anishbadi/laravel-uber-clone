<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class LocationDistanceRequest extends FormRequest
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
            'from_location_id.required' => 'Start location is required',
            'from_location_id.exists' => 'Location not found',
            'to_location_id.required' => 'Destination is required',
            'to_location_id.exists' => 'Location not found',
        ];
    }

    /**
    * Get the error messages for the defined validation rules.
    *
    * @param  \Illuminate\Contracts\Validation\Validator  $validator
    * @return array
    */
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
        'errors' => $validator->errors(),
        'status' => false
        ], 422));
    }
}
