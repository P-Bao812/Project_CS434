<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PhanQuyenUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => ['required', 'exists:phan_quyens,id'],
            'tenquyen' => ['required', 'string', 'max:100'],
            'mota' => ['nullable', 'string', 'max:255'],
        ];
    }
}
