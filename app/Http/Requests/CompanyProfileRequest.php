<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CompanyProfileRequest extends FormRequest
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
            'company_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'company_name.required' => __('about_us.company_name_required'),
            'phone.required' => __('about_us.phone_required'),
            'email.required' => __('about_us.email_required'),
        ];
    }
}
