<?php

namespace App\Http\Requests\Setting\Tax;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaxRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:30'],
            'rate' => ['required', 'numeric']
        ];
    }
}
