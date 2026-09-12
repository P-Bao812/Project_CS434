<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhieuGoiY extends Model
{
    protected $table = 'phieu_goi_y_s';
    protected $fillable = [
        'manguoidung',
        'noidungnhap',
        'thoigiangoiy',
        'loaigoiy'
    ];
}
