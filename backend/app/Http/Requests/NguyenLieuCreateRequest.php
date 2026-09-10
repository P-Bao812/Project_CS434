<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class NguyenLieuCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'tengnuyenlieu' => ['required', 'string', 'max:200'],
            'donvitinh' => ['required', 'string', 'max:50'],
            'ghichu' => ['nullable', 'string', 'max:100'],
        ];
    }
}
