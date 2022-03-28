<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryByNameRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'search' => 'required|string'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
