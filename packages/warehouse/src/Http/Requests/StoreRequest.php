<?php

namespace QH\Warehouse\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|unique:stores,name',
            'phone' => 'required|digits:10',
            'location' => 'required',
            'status' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => ':attribute không được trống',
            'phone' => [
                'required' => ':attribute không được trống',
                'phone' => ':attribute có 10 số'
            ],
            'location.required' => ':attribute không được trống',
            'name.unique' => ':attribute đã tồn tại'
        ];
    }
    public function attributes()
    {
        return [
            'name' => "Tên danh mục",
            'description' => "Mô tả",
            'location' => "Địa chỉ",
            'phone' => "Số điện thoại",
        ];
    }
}
