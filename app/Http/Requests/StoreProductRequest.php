<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:300'],
            'product_file' => ['required', 'file', 'mimes:zip'],
            'thumbnail' => ['required', 'image', 'mimes:png,jpg,jpeg','max:3000'],
            'category_id' => ['required', 'integer'],
            'price' => ['required', 'integer'],
            'about' => ['required', 'string', 'max:67000'],
        ];
    }
}
