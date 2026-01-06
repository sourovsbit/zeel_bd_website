<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProductSizeRequest extends FormRequest
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
            'sl' => 'required|unique:product_sizes,sl,'.$request->product_size,
            'size_name' => 'required|unique:product_sizes,size_name,'.$request->product_size,
        ];
    }
    public function messages()
    {
        return [
            'sl.required' => __('common.serial_number_required'),
            'sl.unique' => __('common.serial_number_unique'),
            'size_name.required' => __('product_size.size_name_required'),
            'size_name.unique' => __('product_size.size_name_unique'),
        ];
    }
}
