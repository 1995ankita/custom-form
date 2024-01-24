<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FieldRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        $type = $this->input('type');

        switch ($type) {
            case 'text':
                return [
                    'name' => 'required',
                    'shortname' => 'required',
                    'description' => 'required',
                ];
            case 'select':
                return [
                    'name' => 'required',
                    'shortname' => 'required',
                ];
            case 'radio':
                return [
                    'name' => 'required',
                    'shortname' => 'required',
                ];

            default:
                return [
                    'name' => 'required',
                    'shortname' => 'required',
                ];
        }
    }
}
