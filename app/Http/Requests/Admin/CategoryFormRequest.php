<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryFormRequest extends FormRequest
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
        $rules= [
            'name'=>'bail|string|required|max:200',
            'slug'=>'bail|string|required',
            'description'=>'required',
            'image'=>'bail|required|mimes:png,jpg,jpeg|max:2048',
            'meta_title'=>'bail|string|required|max:200',
            'meta_description'=>'required|string',
            'meta_keyword'=>'bail|required|string',
            'status'=>['boolean','nullable'],
            'navbar_status'=>['boolean','nullable']
        ];

        return $rules;
    }
}
