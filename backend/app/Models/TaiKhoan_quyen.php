<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaiKhoan_quyen extends Model
{
    protected $table = 'tai_khoan_quyens';
    protected $fillable = [
        'mataikhoan',
        'maquyen',
    ];
}
