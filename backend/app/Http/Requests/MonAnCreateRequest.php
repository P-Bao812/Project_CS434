<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class MonAnCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'madanhmuc' => ['required', 'integer', 'exists:danh_mucs,id'],
            'tenmonan' => ['required', 'string', 'max:100'],
            'mota' => ['required', 'string', 'max:255'],
            'hinhanh' => ['nullable', 'string', 'max:255'],
            'dokho' => ['required', 'integer'],
            'thoigiannau' => ['required', 'string', 'max:50'],
            'khauphanan' => ['required', 'integer'],
        ];
    }
}
