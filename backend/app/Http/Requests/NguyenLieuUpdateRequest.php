<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class NguyenLieuUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => ['required', 'exists:nguyen_lieus,id'],
            'tengnuyenlieu' => ['required', 'string', 'max:200'],
            'donvitinh' => ['required', 'string', 'max:50'],
            'ghichu' => ['nullable', 'string', 'max:100'],
        ];
    }
}
