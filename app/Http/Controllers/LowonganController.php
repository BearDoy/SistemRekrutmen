<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LowonganPosting;
use App\Models\LowonganKerja;
use Illuminate\Support\Facades\Auth;


class LowonganController extends Controller
{
    // Metode untuk menampilkan formulir tambah data
    public function showLamarForm($id)
    {
        $lowongan = LowonganKerja::find($id); // Gantilah sesuai dengan model dan logika yang Anda miliki
        // dd($lowongan);
        return view('lowongan_kerja.form', ['lowongan' => $lowongan]);
        // return view('lowongan_kerja.form', ['id' => $id]);
    }

    // Metode untuk menyimpan data dari formulir
    public function store(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'tingkat_pendidikan' => 'required',
            'asal_sekolah' => 'required',
            'alamat' => 'required',
            'nomor_hp' => 'required',
            'epi' => 'required',
            'pengalaman' => 'required',
            'sosmed' => 'required',
            'berkas' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);

        // Proses penyimpanan data ke database
        // Disesuaikan dengan model dan struktur tabel di database

        // Contoh:
        $lowongan = new LowonganPosting();
        $lowongan->nik = $request->nik;
        $lowongan->user_id = Auth::user()->id;
        $lowongan->username = Auth::user()->username;

        $lowonganKerja = LowonganKerja::where('id', $request->lowongan_id)
            ->first();
        $lowongan->posisi = $lowonganKerja->posisi;
        $lowongan->batch = $lowonganKerja->batch->nama_batch;
        $lowongan->nama = $request->nama;
        $lowongan->jenis_kelamin = $request->jenis_kelamin;
        $lowongan->tempat_lahir = $request->tempat_lahir;
        $lowongan->tanggal_lahir = $request->tanggal_lahir;
        $lowongan->tingkat_pendidikan = $request->tingkat_pendidikan;
        $lowongan->asal_sekolah = $request->asal_sekolah;
        $lowongan->alamat = $request->alamat;
        $lowongan->nomor_hp = $request->nomor_hp;
        $lowongan->epi = $request->epi;
        $lowongan->pengalaman = $request->pengalaman;
        $lowongan->sosmed = $request->sosmed;
        $lowongan->status = 'witing';

        // Proses upload berkas
        if ($request->hasFile('berkas')) {
            $berkasFileName = time() . '.' . $request->berkas->getClientOriginalExtension();
            $request->berkas->move(public_path('uploads'), $berkasFileName);
            $lowongan->berkas = $berkasFileName;
        }

        // Simpan data ke database
        $lowongan->save();

        return redirect()->route('pelamar.lowongan')->with('success', 'Data lowongan berhasil disimpan.');
    }
}
