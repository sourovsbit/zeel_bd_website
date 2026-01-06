<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'item_id' => 'required',
            'cat_id' => 'required',
            'brand_id' =>' required',
            'product_name' => 'required',
            'purchase_price' => 'required',
            'sale_price' => 'required',
            'unit_id' => 'required',
            'type' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'item_id.required' => __('product.select_item_id'),
            'cat_id.required' => __('product.select_cat_id'),
            'brand_id.required' => __('product.select_brand_id'),
            'product_name.required' => __('product.product_name_required'),
            'purchase_price.required' => __('product.purchase_price_required'),
            'sale_price.required' => __('product.sale_price_required'),
            'unit_id.required' => __('product.unit_id_required'),
            'type.required' => __('product.type_required')
        ];
    }
}
