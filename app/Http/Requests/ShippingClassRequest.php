<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ShippingClassRequest extends FormRequest
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
            'shipping_name' => 'required|unique:shipping_classes,shipping_name,'.$request->shipping_class,
        ];
    }
    public function messages()
    {
        return [
            'sl.required' => __('common.serial_number_required'),
            'sl.unique' => __('common.serial_number_unique'),
            'shipping_name.required' => __('shipping_class.shipping_name_required'),
            'shipping_name.unique' => __('shipping_class.shipping_name_unique'),
        ];
    }
}
