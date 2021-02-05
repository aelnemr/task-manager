<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserNewRequest extends FormRequest
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
            'email' => ['required', 'email', 'unique:users,email'],
            'phone' => 'required|unique:users,phone',
            'is_active' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'phone.unique' => 'please choose another phone number',
            'name.required' => 'Name in required...!'
        ];
    }
}
