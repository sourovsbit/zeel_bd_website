<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class DeliveryChargeRequest extends FormRequest
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
            'shipping_class_id' => 'required',
            'charge_amount' => 'required|unique:delivary_charges,charge_amount,'.$request->delivary_charge,
        ];
    }

    public function messages() : array
    {
        return [
            'sl.required' => __('common.serial_number_required'),
            'sl.unique' => __('common.serial_number_unique'),
            'country_id.required' => __('delivary_charge.select_country'),
            'division_id.required' => __('delivary_charge.select_division'),
            'shipping_class_id.required' => __('delivary_charge.select_shipping'),
            'charge_amount.required' => __('delivary_charge.charge_amount_required'),
        ];
    }
}
