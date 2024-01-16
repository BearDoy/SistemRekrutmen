<?php

namespace App\Http\Controllers;

use App\Models\LowonganKerja;
use App\Models\LowonganPostingan;
use App\Models\Departemen;
use App\Models\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LowonganKerjaController extends Controller
{
    public function index()
    {
        $batch = Batch::all();
        $lowongan_kerja = LowonganKerja::with('departemen','batch')->get();
        $departemens = Departemen::all();
        return view('lowongan_kerja.index', compact('lowongan_kerja', 'departemens', 'batch'));
    }

    public function create()
    {
        $departemens = Departemen::all();
        return view('lowongan_kerja.create', compact('departemens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'posisi' => 'required',
            'departemen_id' => 'required',
            'persyaratan' => 'required',
            'tugas' => 'required',
            'batch_id' => 'required',
        ]);

        $lowongan = new LowonganKerja();

        $lowongan->posisi = $request->posisi;
        $lowongan->departemen_id = $request->departemen_id;
        $lowongan->batch_id = $request->batch_id;
        $lowongan->persyaratan = $request->persyaratan;
        $lowongan->tugas = $request->tugas;

        $lowongan->save();

        return redirect()->back()->with('success', 'Lowongan created successfully');
    }


    public function edit(LowonganKerja $lowongan)
    {
        $departemens = Departemen::all();
        return view('lowongan_kerja.edit', compact('lowongan', 'departemens'));
    }

    public function update(Request $request, LowonganKerja $lowongan_kerja)
    {
        $request->validate([
            'posisi' => 'required',
            'departemen_id' => 'required',
            'batch_id' => 'required',
            'persyaratan' => 'required',
            'tugas' => 'required',
        ]);

        $lowongan_kerja->update($request->all());

        return redirect()->route('lowongan_kerja.index')->with('success', 'Lowongan updated successfully');
    }

    public function destroy(LowonganKerja $lowongan_kerja)
    {
        $lowongan_kerja->delete();

        return redirect()->route('lowongan_kerja.index')->with('success', 'Lowongan deleted successfully');
    }

    public function posting()
    {
        $lowongan_kerja = LowonganKerja::with('departemen')->get();
        $departemens = Departemen::all();
        return view('pelamar.lowongan', compact('lowongan_kerja', 'departemens'));
    }

    public function postingDetail($id)
    {
        $lowongan = LowonganKerja::with('departemen')
        ->where('id', $id)
        ->first();
        $departemens = Departemen::all();
        return view('pelamar.detaillowongan', compact('lowongan', 'departemens'));
    }

    public function lowongan_saya()
    {
        $user = Auth::user();
        $lowongan_saya = \App\Models\LowonganPosting::where('user_id', $user->id)
        ->get();
        return view('lowongan_saya.index', compact('lowongan_saya'));
    }
}
