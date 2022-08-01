<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            'name' => ['required', 'max:255', 'string'],
            'description' => ['required', 'max:255', 'string'],
            'status' => ['required', 'max:255', 'string'],
            'field_float' => ['required', 'numeric'],
            'field_integer' => ['required', 'numeric'],
            'field_bool' => ['required', 'boolean'],
            'field_date' => ['required', 'date'],
            'field_timestamp' => ['required', 'date'],
        ];
    }
}
