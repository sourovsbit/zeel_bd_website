<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ThanaRequest extends FormRequest
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
            'country_id' => 'required',
            'division_id' => 'required',
            'district_id' => 'required',
            'thana_name' => 'required|unique:thanas,thana_name,'.$request->thana_setup,
        ];
    }

    public function messages(): array
    {
        return [
            'sl.required' => __('common.serial_number_required'),
            'sl.unique' => __('common.serial_number_unique'),
            'country_id.required' => __('thana.country_id_required'),
            'division_id.required' => __('thana.division_id_required'),
            'district_id.required' => __('thana.district_id_required'),
            'thana_name.required' => __('thana.thana_name_required'),
            'thana_name.unique' => __('thana.thana_name_unique'),
        ];
    }
}
