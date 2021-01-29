<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
        $rule['date'] = 'date_format:Y-m-d';

        return [
            'T_name' => 'required',
            'details' => 'required',
            'due_date' => ['required ',  $rule['date']],


        ];
    }
    public function messages()
    {
        return [
            'T_name.required' => 'please choose Project Name This one IS already taken @_@',
            'details.required' => 'Details are required ...!',
            'due_date.required' => 'Please date are required ...!',
            'due_date.date_format' => 'Please Enter a valied date are required ..!',

        ];
    }
}
