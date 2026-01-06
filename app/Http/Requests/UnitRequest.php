<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UnitRequest extends FormRequest
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
            'sl' => 'required|unique:units,sl,'.$request->unit,
            'unit_name' => 'required|unique:units,unit_name,'.$request->unit,
        ];
    }

    public function messages(): array
    {
        return [
            'sl.required' => __('common.serial_number_required'),
            'sl.unique' => __('common.serial_number_unique'),
            'unit_name.required' => __('unit.unit_name_required'),
            'unit_name.unique' => __('unit.unit_name_unique'),
        ];
    }
}
