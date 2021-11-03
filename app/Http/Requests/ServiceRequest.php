<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'description'     => 'required|not_in:<p><br></p>',
            'sub_description' => 'sometimes|nullable|not_in:<p><br></p>',
            'image'           => 'required_if:_method,store|file',
            'clients'         => 'array',
            'clients.*'       => 'exists:clients,id',
            'portfolios'      => 'array',
            'portfolios.*'    => 'exists:portfolios,id'
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
            'description.not_in' => 'The description field is required'
        ];
    }
}
