<?php

namespace App\Http\Requests\Product\Item;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreItemRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'price' => ['required'],
            'image' => ['required', 'image', 'mimes:jpe,png,jpeg,gif,webp'],
            'brand_id' => ['nullable', Rule::exists('brands', 'id')->withoutTrashed()],
            'category_id' => ['nullable', Rule::exists('categories', 'id')->withoutTrashed()],
            'discount_id' => ['nullable', Rule::exists('discounts', 'id')->withoutTrashed()]
        ];
    }
}
