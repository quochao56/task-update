<?php

namespace QH\Product\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $product = $this->route('product');

        return [
            'name' => ['required',Rule::unique('products', 'name')->ignore($product)],
            'file' => 'required|image|mimes:jpg,jpeg,png',
            'images' => 'array',
            'images.*' => 'image|mimes:jpg,jpeg,png',
            'price' => 'required|numeric|gt:0',
            'price_sale' => 'numeric|lt:price',
            'qty' => 'required|numeric|gt:0',
            'content' => 'required',
            'category_id' => 'required',
            'warehouse_id' => 'required',
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
            'warehouse_id' => [
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
                'required' => ':attribute không được trống',
                'image' => ':attribute phải là trong jpg,jpeg,png',
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
            'price' => "Giá",
            'qty' => "Số lượng",
            'content' => "Nội dung",
            'category_id' => "Danh mục",
            'warehouse_id' => "Kho",
            'file' => 'Hình ảnh',
            'images' => 'Hình ảnh',
            'price_sale' => 'Giá giảm'
        ];
    }
}
