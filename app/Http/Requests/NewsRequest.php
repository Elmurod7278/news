<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'title_uz' => 'required',
            'title_oz' => 'required',
            'title_ru' => 'required',
            'desc_uz' => 'required',
            'desc_oz' => 'required',
            'desc_ru' => 'required',
            'body_uz' => 'required',
            'body_oz' => 'required',
            'body_ru' => 'required',
            'category' => 'required|integer',
            'region' => 'nullable|integer',
            'image' => 'required',
            'type' => 'nullable',
            'url' => 'nullable',
        ];
    }
}
