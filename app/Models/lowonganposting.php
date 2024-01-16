<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LowonganPosting extends Model
{
    protected $table = 'form';
    protected $guarded = [
        'id'
    ];
    public $timestamps = false;


    public function lowongankerja()
    {
        return $this->belongsTo(LowonganKerja::class, 'posisi');
    }
}
