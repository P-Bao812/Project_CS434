<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CongThucCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'mamonan' => ['required', 'integer', 'exists:mon_ans,id'],
            'huongdannau' => ['required', 'string', 'max:255'],
            'ghichu' => ['nullable', 'string', 'max:100'],
        ];
    }
}
