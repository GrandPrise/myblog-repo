<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderFormRequest extends FormRequest
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
            'client' => 'required|string',
            'phone_number' => 'required|string|max:10|min:10',
            'whatsapp_number' => 'required|string|max:10|min:10',
            'city' => 'required|string|max:100',
            'address' => 'required|string',
            'item' => 'required|string|max:100',
            'quantity' => 'required|integer|between:1,10',
            'total_price' => 'required',
            'remark' => 'bail|nullable|string|max:255',
        ];

        return $rules;
    }
}
