<?php

namespace App\Http\Requests\Menu;

use Illuminate\Foundation\Http\FormRequest;

class MenuStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'type' => 'required',
            'slug' => 'required',
            'sort' => 'integer',
            'menu_id' => 'required',
            'status' => 'required',
            'icon' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:1024',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:3000',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
