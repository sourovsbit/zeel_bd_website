<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProductSubCategoryRequest extends FormRequest
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
            'sl' => 'required|unique:product_sub_categories,sl,'.$request->product_sub_category,
            'item_id' => 'required',
            'category_id' => 'required',
            'sub_category_name' => 'required|unique:product_sub_categories,sub_category_name,'.$request->product_sub_category,
        ];
    }

    public function messages(): array
    {
        return [
            'item_id.required' => __('product_sub_category.item_id_required'),
            'category_id.required' => __('product_sub_category.category_id_required'),
            'sub_category_name.required' => __('product_sub_Category.sub_category_name_required'),
            'sub_category_name.unique' => __('product_sub_category.sub_category_name_unique'),
        ];
    }
}
