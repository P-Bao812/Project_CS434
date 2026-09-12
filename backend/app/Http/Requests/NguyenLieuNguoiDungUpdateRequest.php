<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class NguyenLieuNguoiDungUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => ['required', 'exists:nguyen_lieu_nguoi_dungs,id'],
            'manguoidung' => ['required', 'integer', 'exists:nguoi_dungs,id'],
            'manguyenlieu' => ['required', 'integer', 'exists:nguyen_lieus,id'],
            'soluong' => ['required', 'integer', 'min:1'],
            'donvitinh' => ['required', 'string', 'max:50'],
        ];
    }
}
