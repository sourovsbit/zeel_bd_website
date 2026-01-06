<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ServiceRequest extends FormRequest
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
        return [
            'sl' => 'required',
            'service_name' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'sl.required' => __('common.serial_number_required'),
            'service_name.required' => __('create_service.service_name_required'),
        ];
    }
}
