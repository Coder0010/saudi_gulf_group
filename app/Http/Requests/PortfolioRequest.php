<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioRequest extends FormRequest
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
            'name.en'     => 'required|string',
            'name.ar'     => 'required|string',
            'description.en' => 'sometimes|nullable|not_in:<p><br></p>',
            'description.ar' => 'sometimes|nullable|not_in:<p><br></p>',
            'image'       => 'required_if:_method,store|file',
            'sub_name'    => 'sometimes|nullable',
            'category'    => 'sometimes|nullable',
            'location'    => 'sometimes|nullable',
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
