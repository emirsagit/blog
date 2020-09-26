<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleCreateFormRequest extends FormRequest
{
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
            'title' => 'required',
            'body' => 'required',
            'tags' => 'exists:tags,id',
            'thumbnail' => 'file|image|max:1999',
            'seo_title' => 'max:65',
            'seo_description' => 'max:160',
        ];
    }
}
