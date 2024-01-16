<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Biodata extends Model
{
    protected $table = 'biodata';
    protected $dates = ['tanggal_lahir' => 'datetime:Y-m-d'];
    protected $fillable = ['id', 'user_id', 'nama_lengkap', 'jenis_kelamin', 'agama', 'alamat', 'kode_pos', 'tempat_lahir', 'tanggal_lahir', 'status_nikah', 'no_npwp', 'pendidikan_terakhir', 'nomor_telepon', 'warga_negara', 'file_ktp', 'cv', 'surat_lamaran', 'ijazah', 'persetujuan', 'status'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function getImage()
    {
        if (!$this->image) {
            return asset('images/default.jpg');
        }
        return asset('images/' . $this->image);
    }
}
