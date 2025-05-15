<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|regex:/@powerdigitalmarketinginc\.com$/|unique:users,email,' . $this->route('user'),
            'password' => 'nullable|string|min:8|confirmed',
            'role_id'  => 'nullable|exists:roles,id',
            'team_id'  => 'nullable|exists:teams,id',
        ];
    }
}
