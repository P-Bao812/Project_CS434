<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ChiTietNguyenLieuCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'mamonan' => ['required', 'integer', 'exists:mon_ans,id'],
            'manguyenlieu' => ['required', 'integer', 'exists:nguyen_lieus,id'],
            'soluong' => ['required', 'integer'],
            'donvitinh' => ['required', 'string', 'max:50'],
        ];
    }
}
