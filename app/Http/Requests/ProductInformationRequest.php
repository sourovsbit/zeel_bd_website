<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProductInformationRequest extends FormRequest
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
            'sl' => 'required|unique:product_informations,sl,'.$request->product_information,
            'item_id' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'unit_id' => 'required',
            'product_name' => 'required|unique:product_informations,product_name,'.$request->product_information,
            'purchase_price' => 'required',
            'sale_price' => 'required',
            'moq' => 'required',
            'product_type' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'sl.required' => __('common.serial_number_required'),
            'sl.unique' => __('common.serial_number_unique'),
            'item_id.required' => __('product_information.item_id_required'),
            'category_id.required' => __('product_information.category_id_required'),
            'brand_id.required' => __('product_information.brand_id_required'),
            'unit_id.required' => __('product_information.unit_id_required'),
            'product_name.required' => __('product_information.product_name_required'),
            'product_name.unique' => __('product_information.product_name_unique'),
            'purchase_price.required' => __('product_information.purchase_price_required'),
            'sale_price.required' => __('product_information.sale_price_required'),
            'moq.required' => __('product_information.moq_required'),
            'product_type.required' => __('product_information.product_type.required'),
        ];
    }
}
