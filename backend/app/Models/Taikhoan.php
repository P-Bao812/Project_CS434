<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Database\Factories\UserFactory;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Taikhoan extends Authenticatable
{
    use Notifiable, HasApiTokens;

    protected $table = 'taikhoans';
    protected $fillable = [
        'emaildangnhap',
        'manguoidung',
        'password',
        'trangthai',
        'lannhapcuoi',
    ];
}
