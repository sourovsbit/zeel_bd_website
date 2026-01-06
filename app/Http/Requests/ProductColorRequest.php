<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProductColorRequest extends FormRequest
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
            'sl' => 'required|unique:product_colors,sl,'.$request->product_color,
            'color_name' => 'required|unique:product_colors,color_name,'.$request->product_color,
        ];
    }
    public function messages()
    {
        return [
            'sl.required' => __('common.serial_number_required'),
            'sl.unique' => __('common.serial_number_unique'),
            'color_name.required' => __('product_color.color_name_required'),
            'color_name.unique' => __('product_color.color_name_unique'),
        ];
    }
}
