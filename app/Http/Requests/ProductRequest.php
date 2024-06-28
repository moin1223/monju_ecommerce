<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'product_name' => 'required|string',
            'old_price' => 'required',
            'new_price' => 'required',
            'weight' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'image' => ['nullable', 'required_with:image', File::image()->max(4 * 1024)],
            'review_1' => ['nullable', File::image()->max(4 * 1024)],
            'review_2' => ['nullable', File::image()->max(4 * 1024)],
            'review_3' => ['nullable', File::image()->max(4 * 1024)],
            'cartificate_1' => ['nullable', File::image()->max(4 * 1024)],
            'cartificate_2' => ['nullable', File::image()->max(4 * 1024)],
            'cartificate_3' => ['nullable',File::image()->max(4 * 1024)],
           
        ];
    }
}
