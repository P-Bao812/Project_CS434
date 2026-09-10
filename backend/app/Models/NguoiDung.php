<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NguoiDung extends Model
{
    protected $table = 'nguoi_dungs';
    protected $fillable = [
        'hoten',
        'tenhienthi',
        'goithieungan',
        'emaillienhe',
        'sodienthoai',
        'ngaysinh',
        'diachi',
        'anhdaidien',
    ];
}
