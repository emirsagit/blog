<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
    // protected $fillable = [
    //     'about', 'logo', 'tel', 'email', 'whatsapp', 'facebook', 'instagram', 'linkedin', 'twitter', 'github', 'homeTitle', 'homeSubtitle', 'contactTitle', 'contactSubtitle', 'authorTitle', 'authorSubtitle', 'categoryTitle', 'categorySubtitle', 'homeSeoTitle', 'homeSeoDescription', 'categorySeoTitle', 'categorySeoDescription', 'contactSeoTitle', 'contactSeoDescription', 'authorSeoTitle', 'authorSeoDescription',
    // ];
    public function rules()
    {
        return [
            'about' => 'min:100|max:800|nullable',
            'logo' => 'image|nullable|max:999',
            'email' => 'email|nullable',
            'tel' => 'numeric|nullable|min:13',
            'whatsapp' => 'numeric|nullable|min:13',
            'facebook' => 'url|nullable',
            'instagram' => 'url|nullable',
            'linkedin' => 'url|nullable',
            'twitter' => 'url|nullable',
            'github' => 'url|nullable',
            'homeSeoTitle' => 'nullable|max:65',
            'categorySeoTitle' => 'nullable|max:65',
            'contactSeoTitle' => 'nullable|max:65',
            'authorSeoTitle' => 'nullable|max:65',
            'homeSeoDescription' => 'nullable|max:160',
            'categorySeoDescription' => 'nullable|max:160',
            'contactSeoDescription' => 'nullable|max:160',
            'authorSeoDescription' => 'nullable|max:160',
        ];
    }
}
