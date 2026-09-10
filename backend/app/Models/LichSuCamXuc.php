<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LichSuCamXuc extends Model
{
    protected $table = 'lich_su_cam_xucs';
    protected $fillable = [
        'manguoidung',
        'macamxuc',
        'thoigianchon',
        'ghichu',
    ];
}
