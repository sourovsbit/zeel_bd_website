<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class SubUnitRequest extends FormRequest
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
            'unit_id' => 'required',
            'sub_unit_name' => 'required|unique:sub_units,sub_unit_name,'.$request->sub_unit,
            'sub_unit_data' => 'required'
        ];
    }


    public function messages(): array
    {
        return [
            'sl.required' => __('common.serial_number_required'),
            'sl.unique' => __('common.serial_number_unique'),
            'unit_id.required' => __('sub_unit.select_unit'),
            'sub_unit_name.required' => __('sub_unit.sub_unit_name_required'),
            'sub_unit_data.required' => __('sub_unit.sub_unit_data_required'),
        ];
    }
}
