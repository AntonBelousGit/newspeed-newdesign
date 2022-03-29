<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class SearchChildrenByParantIdRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id'=> 'required',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
