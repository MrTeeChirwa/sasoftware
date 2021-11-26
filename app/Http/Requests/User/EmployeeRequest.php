<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'id' => 'required',
            'firstName' => 'required',
            'lastName'    => 'required',
            'contactNumber'    => 'required',
            'emailAddress'    => 'required',
            'streetAddress'    => 'required',
            'city'    => 'required',
            'postalCode'    => 'required',
            'country'    => 'required',
            'skills.*.skill' => 'required',
            'skills.*.yearsExprience' => 'required',
            'skills.*.seniorityRating' => 'required',

        ];
    }
}
