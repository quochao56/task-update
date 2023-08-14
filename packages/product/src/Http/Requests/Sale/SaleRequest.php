<?php

namespace QH\Product\Http\Requests\Sale;

use Illuminate\Foundation\Http\FormRequest;

class SaleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:10',
            'address' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => ":attribute không được trống",
            'email' => [
                'required' => ':attribute không được trống',
                'email' => ':attribute không hợp lệ'
            ],
            'phone' => [
                'required' => ':attribute không được trống',
                'phone' => ':attribute có 10 số'
            ],
            'address.required' => ':attribute không được trống'
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Tên',
            'email' => 'Email',
            'phone' => 'Số điện thoại',
            'address' => 'Địa chỉ'
        ];
    }
}
