<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    protected $table = 'batch';
    protected $fillable = ['nama_batch', 'tanggal', 'status'];
    public $timestamps = false;

    public function lowongan()
    {
        return $this->hasMany(Lowongan::class);
    }
}
