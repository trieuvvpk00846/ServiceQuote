<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'price' => (int) filter_var($this->price, FILTER_SANITIZE_NUMBER_INT),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:155'],
            'price' => ['required', 'integer', 'min:0', 'max:999999999'],
            'unit' => ['nullable', 'max:20'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:12000'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên sản phẩm!',
            'name.max' => 'Tên quá dài!',

            'price.integer' => 'Giá bán không hợp lệ!',
            'price.min' => 'Giá bán không hợp lệ!',
            'price.max' => 'Giá bán vượt quá giới hạn!',

            'unit.max' => 'Đơn vị quá dài!',

            'image.mimes' => 'Không đúng định dạng file!',
            'image.max' => 'Kích thước hình ảnh quá lớn!',
        ];
    }
}
