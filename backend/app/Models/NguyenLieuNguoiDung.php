<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NguyenLieuNguoiDung extends Model
{
    protected $table = 'nguyen_lieu_nguoi_dungs';
    protected $filltable = [
        'manguoidung',
        'manguyenlieu',
        'soluong',
        'donvi',
        'ngaycapnhat',
        'ghichu'
    ];
}
