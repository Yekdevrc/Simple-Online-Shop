<?php

namespace App\Http\Requests\UserManagement\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required'],
            'role_id' => ['required', Rule::exists('roles', 'id')->withoutTrashed()],
            'password' => ['required', 'confirmed'],
            'profile_photo_path' => ['required', 'image', 'mimes:jpg,png,jpeg,gif'],
        ];
    }
}
