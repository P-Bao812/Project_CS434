<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CamXuc extends Model
{
    protected $table = 'cam_xucs';
    protected $fillable = [
        'tencamxuc',
        'mota'
    ];
}
