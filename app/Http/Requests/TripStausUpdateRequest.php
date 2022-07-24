<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class TripStausUpdateRequest extends FormRequest
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
            'trip_id' => 'required|exists:trips,id',
            'status' => 'required|in:progress,completed',
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
            'trip_id.required' => 'trip is required',
            'trip_id.exists' => 'trip not found',
            'status.required' => 'required is required',
            'status.in' => 'Status accpect only progress or completed',
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
