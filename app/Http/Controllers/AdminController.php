<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\Mime\MimeTypes;
use App\Models\User;
use App\Models\Biodata;
use App\Models\LowonganPosting;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use DataTables;


class AdminController extends Controller
{
    public function home()
    {
        $count = User::count();
        return view('admin/home')->with('count', $count);
    }

    public function index(Request $request)
    {
        $keyword = $request->get('keyword');
        $form = \App\Models\LowonganPosting::all();
        if ($keyword) {
            $form = \App\Models\LowonganPosting::where("username", "LIKE", "%$keyword%")->paginate(10);
        } else {
            $form = \App\Models\LowonganPosting::all();
        }
        return view('admin/datausers', ['form' => $form]);
    }

    public function detailusers($id)
    {
        //$biodata = \App\Models\User::all();
        $form = \App\Models\LowonganPosting::where('id', $id)->first();
        // dd($form->berkas);
        return view('admin/detaildatausers', ['form' => $form]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateStatus(Request $request, string $id)
    {
        $data = [
            'status'    =>  $request->status,
        ];

        $form = \App\Models\LowonganPosting::where('id', $id)->update($data);
        return redirect('/admin/datausers');
    }

    public function create(Request $request)
    {
        $users = new User;
        $users->nip = $request->input('nip');
        $users->username = $request->input('username');
        $users->level = $request->input('level');
        $users->email = $request->input('email');
        $users->satker = $request->input('satker');
        $users->remember_token = Str::random(60);
        $users->password = Hash::make($request->input('password'));
        if ($request->hasfile('image')) {
            $request->file('image')->move('images/', $request->file('image')->getClientOriginalName());
            $users->image = $request->file('image')->getClientOriginalName();
            $users->save();
        }
        return redirect('/users')->with('sukses', 'Data Berhasil Disimpan');
    }

    public function biodatacreate(Request $request)
    {

        $biodata = new Biodata;
        $biodata->nama_lengkap = $request->input('nama_lengkap');
        $biodata->jenis_kelamin = $request->input('jenis_kelamin');
        $biodata->agama = $request->input('agama');
        $biodata->alamat = $request->input('alamat');
        $biodata->kode_pos = $request->input('kode_pos');
        $biodata->tempat_lahir = $request->input('tempat_lahir');
        $biodata->tanggal_lahir = $request->input('tanggal_lahir');
        $biodata->status_nikah = $request->input('status_nikah');
        $biodata->nomor_telepon = $request->input('nomor_telepon');
        $biodata->warga_negara = $request->input('warga_negara');
        $biodata->no_npwp = $request->input('no_npwp');
        $biodata->pendidikan_terakhir = $request->input('pendidikan_terakhir');
        if ($request->hasfile('image')) {
            $request->file('image')->move('filektp/', $request->file('image')->getClientOriginalName());
            $biodata->image = $request->file('image')->getClientOriginalName();
            $biodata->save();
        }


        return redirect('admin/datausers')->with('update', 'Data berhasil diupdate!');
    }

    public function detail($id)
    {
        //$biodata = \App\Models\User::all();
        $form = \App\Models\LowonganPosting::where('user_id', $id)->get();
        //dd($biodata);
        return view('admin/detail', ['form' => $form]);
    }

    public function diterima(Request $request, $id)
    {
        $form = \App\Models\LowonganPosting::find($id);
        $form->status = 'Diterima';
        $form->update($request->all());

        return redirect('/admin/datausers')->with('diterima', 'Pelamar Berhasil Diterima!');
    }

    public function ditolak(Request $request, $id)
    {
        $form = \App\Models\LowonganPosting::find($id);
        $form->status = 'Ditolak';
        $form->update($request->all());

        return redirect('/admin/datausers')->with('ditolak', 'Pelamar Berhasil Ditolak!');
    }
}
