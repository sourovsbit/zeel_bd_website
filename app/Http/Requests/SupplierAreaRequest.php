<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class SupplierAreaRequest extends FormRequest
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
            'area_name' => 'required|unique:supplier_areas,area_name,'.$request->area_name,
        ];
    }

    public function messages(): array
    {
        return [
            'area_name.required' => __('supplier_area.area_name_required'),
            'area_name.unique' => __('supplier_area.area_name_unique')
        ];
    }
}
