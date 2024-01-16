<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Users extends Model
{
    protected $table = 'users';
    protected $dates = ['tanggal_lahir' => 'datetime:Y-m-d'];
    protected $fillable = ['id', 'nip', 'no_ktp', 'username', 'level', 'email', 'password', 'confirm_password', 'satker', 'image', 'remember_token', 'created_at', 'updated_at'];
}
