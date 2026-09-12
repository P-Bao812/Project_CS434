<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CongThucUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => ['required', 'exists:cong_thucs,id'],
            'mamonan' => ['required', 'integer', 'exists:mon_ans,id'],
            'huongdannau' => ['required', 'string', 'max:255'],
            'ghichu' => ['nullable', 'string', 'max:100'],
        ];
    }
}
