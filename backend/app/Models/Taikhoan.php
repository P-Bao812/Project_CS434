<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Taikhoan extends Model
{
    protected $table = 'taikhoans';
    protected $fillable = [
        'emaildangnhap',
        'manguoidung',
        'matkhau',
        'trangthai',
        'landangnhapcuoi',
        'ngaytao',  
    ];
}
