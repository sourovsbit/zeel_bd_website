<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class VideoGalleryRequest extends FormRequest
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
            'sl' => 'required',
            'url' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'sl.required' => __('common.serial_number_required'),
            'url.required' => __('create_service.url_required'),
        ];
    }
}
