<?php

namespace QH\Product\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
        $category = $this->route('category');

        return [
            'name' => ['required',Rule::unique('categories', 'name')->ignore($category)],
            'description' => 'required',
            'status' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => ':attribute không được trống',
            'description.required' => ':attribute không được trống',
            'name.unique' => ':attribute đã tồn tại'
        ];
    }
    public function attributes()
    {
        return [
            'name' => "Tên danh mục",
            'description' => "Mô tả"
        ];
    }
}
