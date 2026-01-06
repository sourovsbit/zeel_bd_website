<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class VendorRequest extends FormRequest
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
    public function rules(Request $request): array
    {
        return [
            'sl' =>'required',
            'country_id' => 'required',
            'email' => 'required|unique:vendors,email,'.$request->vendor,
            'vendor_phone' => 'required|unique:vendors,vendor_phone,'.$request->vendor,
            'company_phone' => 'required|unique:vendors,company_phone,'.$request->vendor,
        ];
    }

    public function messages() : array
    {
        return [
            'sl.required' => __('common.serial_number_required'),
            'sl.unique' => __('common.serial_number_unique'),
            'country_id.required' => __('vendor.select_country'),
            'vendor_phone.required' => __('vendor.vendor_phone_required'),
            'company_phone.required' => __('vendor.company_phone_required'),
            'email.required' => __('vendor.email_required'),
            'email.unique' => __('vendor.email_unique'),
        ];
    }
}
