<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class DanhMucUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => ['required', 'exists:danh_mucs,id'],
            'tendanhmuc' => ['required', 'string', 'max:100'],
            'mota' => ['nullable', 'string', 'max:255'],
        ];
    }
}
