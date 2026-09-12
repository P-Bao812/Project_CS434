<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonAnCamXuc extends Model
{
    protected $table = 'mon_an_cam_xucs';
    protected $fillable = [
        'macamxuc',
        'mamonan',
        'mucdophuhop',
        'ghichu'
    ];
}
