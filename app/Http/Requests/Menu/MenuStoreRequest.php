<?php

namespace App\Http\Requests\Menu;

use Illuminate\Foundation\Http\FormRequest;

class MenuStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'slug' => 'required',
            'sort' => 'integer',
            'menu_id' => 'required',
            'status' => 'required',
            'icon' => 'required',
            'child_id' => 'array|nullable'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
