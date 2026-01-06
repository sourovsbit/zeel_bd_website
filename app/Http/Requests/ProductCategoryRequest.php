<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProductCategoryRequest extends FormRequest
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
            'sl' =>'required|unique:product_categories,sl,'.$request->product_category,
            'item_id' => 'required',
            'category_name' => 'required|unique:product_categories,category_name,'.$request->product_category,
        ];
    }

    public function messages(): array
    {
        return [
            'sl.required' => __('common.serial_number_required'),
            'sl.unique' => __('common.serial_number_unique'),
            'item_id.required' => __('product_category.item_id_required'),
            'category_name.required' => __('product_Category.category_name_required'),
            'category_name.unique' => __('product_category.category_name_unique'),
        ];
    }
}
