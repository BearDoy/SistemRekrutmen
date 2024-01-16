<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LowonganKerja extends Model
{
    protected $table = 'lowongan_kerja';
    protected $fillable = ['posisi', 'departemen_id', 'batch_id', 'persyaratan', 'tugas'];

    public $timestamps = false;

    public function departemen()
    {
        return $this->belongsTo(Departemen::class);
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    public function lowongposting()
    {
        return $this->hasMany(LowonganPosting::class);
    }
}
