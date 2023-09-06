<?php

namespace QH\Product\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $product = $this->route('product');

        return [
            'name' => ['required',Rule::unique('products', 'name')->ignore($product)],
            'file' => 'image|mimes:jpg,jpeg,png',
            'images' => 'array',
            'images.*' => 'image|mimes:jpg,jpeg,png',
            'price' => 'required|numeric|gt:0',
            'qty' => 'required|numeric|gt:0',
            'content' => 'required',
            'category_id' => 'required',
            'price_sale' => 'numeric|lt:price',

        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => ':attribute không được trống',
            'name.unique' => ':attribute đã tồn tại',
            'content.required' => ':attribute không được trống',
            'qty.required' => ':attribute không được trống',
            'category_id' => [
                'required' => ':attribute không được trống',
            ],
            'price' => [
                'required' => ':attribute không được trống',
                'gt:0' => ':attribute phải lớn hơn 0',
                'numeric' => ':attribute phải là số và lớn hơn 0',
            ],
            'price_sale' => [
                'lt' => ':attribute phải nhỏ hơn giá sản phẩm',
                'numeric' => ':attribute phải là số và lớn hơn 0',
            ],
            'file' => [
                'image' => ':attribute phải là một hình ảnh',
                'mimes' => ':attribute không hợp lệ',
            ],
            'images' => [
                'image' => ':attribute phải là một trong jpg,jpeg,png',
                'mimes' => ':attribute không hợp lệ',
            ],

        ];
    }

    public function attributes()
    {
        return [
            'name' => "Tên sản phẩm",
            'thumb' => "Hình ảnh",
            'price' => "Giá",
            'qty' => "Số lượng",
            'content' => "Nội dung",
            'category_id' => "Danh mục",
            'file' => 'File',
            'images' => 'Hình ảnh',
            'price_sale' => 'Giá giảm'
        ];
    }
}
