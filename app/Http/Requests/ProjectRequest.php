<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'p_name' => ['required','unique:projects,p_name'],
            'descprition' => 'required',

        ];
    }
    public function messages()
    {
        return [
            'p_name.unique' => 'please choose Project Name This one IS already taken @_@',
            'descprition.required' => 'descprition is required ...!'
        ];
    }
}
