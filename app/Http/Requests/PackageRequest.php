<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'            => 'required|string',
            'sub_name'        => 'sometimes|nullable|string',
            'description'     => 'sometimes|nullable|not_in:<p><br></p>',
            'sub_description' => 'sometimes|nullable|not_in:<p><br></p>',
            'image'           => 'required_if:_method,store|file',
            'data'            => 'sometimes|nullable|array',
            'data.*'          => 'sometimes|nullable|string',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'description.not_in' => 'The description field is required',
            'sub_description.not_in' => 'The description field is required'
        ];
    }
}
