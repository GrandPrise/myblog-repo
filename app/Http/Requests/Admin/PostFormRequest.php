<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'category_id' => 'required|integer',
            'name' => 'required|string|max:100',
            'slug' => 'required|string|max:100',
            'description' => 'required|max:255',
            'yt_frame' => 'nullable|string',
            'meta_title' => 'bail|string|required|max:200',
            'meta_description' => 'bail|string|nullable|max:255',
            'meta_keyword' => 'bail|required|string',
            'status' => 'boolean|nullable',
        ];
        return $rules;
    }
}
