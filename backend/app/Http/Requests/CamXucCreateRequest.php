<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CamXucCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'tencamxuc' => ['required', 'string', 'max:100'],
            'mota' => ['nullable', 'string', 'max:255'],
        ];
    }
}
