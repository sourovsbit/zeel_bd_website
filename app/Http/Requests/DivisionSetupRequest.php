<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class DivisionSetupRequest extends FormRequest
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
            'division_name' => 'required|unique:division_setups,division_name,'.$request->division_setup,
        ];
    }

    public function messages() : array
    {
        return [
            'sl.required' => __('common.serial_number_required'),
            'sl.unique' => __('common.serial_number_unique'),
            'country_id.required' => __('division_setup.select_country'),
            'division_name.required' => __('division_setup.division_name_required'),
        ];
    }
}
