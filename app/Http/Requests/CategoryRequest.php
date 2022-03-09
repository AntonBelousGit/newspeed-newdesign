<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'category_id' => 'required',
            'seo_description' => 'required|string|max:500',
            'description' => 'required|string|max:500',
            'slug' => 'required|string|max:500',
            'status' => 'required',
            'popular' => 'string|nullable',
            'recomend' => 'string|nullable',
            'image' => 'string|nullable',
        ];
    }

    public function messages()
    {
        return [
            'status.required' => 'Это поле обязательно "Статус"',
            'max:255' => 'Поле не долждно превышать 255 символов',
            'max:500' => 'Поле не должно превышать 500 символов',
        ];
    }
}
