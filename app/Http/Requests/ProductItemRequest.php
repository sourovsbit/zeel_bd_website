<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProductItemRequest extends FormRequest
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
            'sl' => 'required|unique:product_items,sl,'.$request->product_item,
            'item_name' => 'required|unique:product_items,item_name,'.$request->product_item,
        ];
    }

    public function messages()
    {
        return [
            'sl.required' => __('common.serial_number_required'),
            'sl.unique' => __('common.serial_number_unique'),
            'item_name.required' => __('product_item.item_name_required'),
            'item_name.unique' => __('product_item.item_name_unique'),
        ];
    }
}
