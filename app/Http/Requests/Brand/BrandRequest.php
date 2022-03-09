<?php

namespace App\Http\Requests\Brand;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}