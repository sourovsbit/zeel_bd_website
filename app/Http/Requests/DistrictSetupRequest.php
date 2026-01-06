<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class DistrictSetupRequest extends FormRequest
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
            'division_id' => 'required',
            'district_name' => 'required|unique:district_setups,district_name,'.$request->district_setup,
        ];
    }

    public function messages() : array
    {
        return [
            'sl.required' => __('common.serial_number_required'),
            'sl.unique' => __('common.serial_number_unique'),
            'country_id.required' => __('district_setup.select_country'),
            'division.required' => __('district_setup.select_division'),
            'district_name.required' => __('district_setup.district_name_required'),
        ];
    }
}
