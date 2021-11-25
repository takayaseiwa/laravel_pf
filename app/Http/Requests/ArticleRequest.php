<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'title' => 'required|string|max:50',
            'category_id' => 'required|string|max:1',
            'summary' => 'required|string|min:30',
            'image' => 'file|mimes:jpeg,png,jpg,bmb|max:2048',
        ];
    }
}
