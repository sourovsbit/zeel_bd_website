<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class SupplierRequest extends FormRequest
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
            'sl' => 'required',
            'supplier_name' => 'required',
            'phone_number' => 'required|unique:suppliers,phone_number,'.$request->supplier_info,
            'company_name' => 'required',
        ];

    }

    public function messages(): array
    {
        return [
            'sl.required' => __('common.serial_number_required'),
            'supplier_name.required' => __('supplier.supplier_name_required'),
            'phone_number.required' => __('supplier.phone_number_required'),
            'company_name.required' => __('supplier.company_name_required'),
        ];
    }
}
