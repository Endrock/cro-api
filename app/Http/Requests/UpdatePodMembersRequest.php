<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePodMembersRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Cambia esto si necesitas políticas o permisos
    }

    public function rules(): array
    {
        return [
            'user_ids'   => 'nullable|array',
            'user_ids.*' => 'exists:users,id',
        ];
    }
}
