<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'string',
            'category_id' => '',
            'price_min' => '',
            'price_max' => '',
            'brand_id' => '',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}