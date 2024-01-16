<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\Mime\MimeTypes;
use App\Models\User;
use App\Models\Biodata;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    public function pengumuman(Request $request)
    {
        //dd($request);
        //$biodata = \App\Models\Biodata::all();
        $user = \App\Models\User::where("level", "user")->with('biodata')->get();
        //dd($user);
        return view('/pengumuman', ['user' => $user]);
        //return response()->json($user);
    }

    public function biodata(Request $request)
    {
        //dd($request);
        $id = Auth::id();
        //$biodata = \App\Models\User::all();
        $biodata = \App\Models\Biodata::where('user_id', $id)->get();
        return view('pelamar/biodata', ['biodata' => $biodata]);
    }

    public function biodata2(Request $request)
    {
        //dd($request);
        $id = Auth::id();
        //$biodata = \App\Models\User::all();
        $biodata = \App\Models\Biodata::where('user_id', $id)->get();
        return view('pelamar/uploadfile', ['biodata' => $biodata]);
    }

    public function biodata3(Request $request)
    {
        //dd($request);
        $id = Auth::id();
        //$biodata = \App\Models\User::all();
        $biodata = \App\Models\Biodata::where('user_id', $id)->get();
        return view('pelamar/persetujuan', ['biodata' => $biodata]);
    }

    public function reg()
    {
        return view('users/register');
    }

    public function register(Request $request)
    {
        $this->validate(
            $request,
            [
                'username' => 'required|unique:users,username',
                'email' => 'required|unique:users,email',
                'password' => 'required',
                'confirm_password' => 'required|same:password'
            ],
            [
                'username.required' => 'Username Harus Diisi',
                'username.unique' => 'Username Sudah Ada',
                'email.required' => 'Email Harus Diisi',
                'email.unique' => 'Email Sudah Ada',
                'password.required' => 'Password Harus Diisi',
                'confirm_password.required' => 'Konfirmasi Password Harus Diisi',
                'confirm_password.same' => 'Konfirmasi Password Harus Sama'
            ]
        );

        $users = new User;
        $users->username = $request->input('username');
        $users->email = $request->input('email');
        $users->remember_token = Str::random(60);
        $users->password = Hash::make($request->input('password'));
        $users->confirm_password = Hash::make($request->input('confirm_password'));
        $users->level = 'user';

        $users->save();
        return redirect('/')->with('sukses', 'Berhasil, Silahkan Login!');
    }


    public function update(Request $request, $id)
    {
        //dd($id);
        $biodata = \App\Models\Biodata::find($id);
        $biodata->update($request->all());
        $this->validate(
            $request,
            [
                'no_ktp' => 'required',
                'nama_lengkap' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'agama' => 'required',
                'alamat' => 'required',
                'kode_pos' => 'required',
                'nomor_telepon' => 'required',
                'jenis_kelamin' => 'required',
                'warga_negara' => 'required',
                'status_nikah' => 'required',
                'no_npwp' => 'required',
                'pendidikan_terakhir' => 'required'
            ],
            [
                'no_ktp.required' => 'No KTP Harus Diisi',
                'nama_lengkap.required' => 'Nama Lengkap Harus Diisi',
                'tempat_lahir.required' => 'Tempat Lahir Harus Diisi',
                'tanggal_lahir.required' => 'Tanggal Lahir Harus Diisi',
                'agama.required' => 'Agama Harus Diisi',
                'alamat.required' => 'Alamat Harus Diisi',
                'kode_pos.required' => 'Kode Pos Harus Diisi',
                'nomor_telepon.required' => 'Nomor Telepon/Hp Harus Diisi',
                'jenis_kelamin.required' => 'Jenis Kelamin Harus Diisi',
                'warga_negara.required' => 'Warga Negara Harus Diisi',
                'status_nikah.required' => 'Status Perkawinan Harus Diisi',
                'no_npwp.required' => 'No NPWP Harus Diisi',
                'pendidikan_terakhir.required' => 'Pendidikan Terakhir Harus Diisi',
            ]
        );
        $biodata->user()->update(['no_ktp' => $request->input('no_ktp')]);
        return redirect('pelamar/uploadfile')->with('update', 'Data berhasil diinput!');
    }

    public function file(Request $request, $id)
    {
        $this->validate(
            $request,
            [

                'file_ktp' => 'mimes:jpeg,png,jpg|max:2048',
                'cv' => 'mimes:pdf|max:2048',
                'surat_lamaran' => 'mimes:pdf|max:2048',
                'ijazah' => 'mimes:pdf|max:2048'

            ],
            [

                'file_ktp.mimes' => 'File KTP Harus Berformat JPEG,PNG,JPG',
                'file_ktp.max' => 'File KTP Tidak Boleh Berukuran Lebih Dari 2 MB',

                'cv.mimes' => 'CV Harus Berformat PDF',
                'cv.max' => 'CV Tidak Boleh Berukuran Lebih Dari 2 MB',

                'surat_lamaran.mimes' => 'Surat Lamaran Harus Berformat PDF',
                'surat_lamaran.max' => 'Surat Lamaran Tidak Boleh Berukuran Lebih Dari 2 MB',

                'ijazah.mimes' => 'Ijazah Harus Berformat PDF',
                'ijazah.max' => 'Ijazah Tidak Boleh Berukuran Lebih Dari 2 MB',
            ]

        );
        //dd($id);
        $biodata = \App\Models\Biodata::find($id);
        if ($request->hasfile('file_ktp')) {
            $request->file('file_ktp')->move('pelamar/filektp/', $request->file('file_ktp')->getClientOriginalName());
            $biodata->file_ktp = $request->file('file_ktp')->getClientOriginalName();
            $biodata->save();
        }
        if ($request->hasfile('cv')) {
            $request->file('cv')->move('pelamar/cv/', $request->file('cv')->getClientOriginalName());
            $biodata->cv = $request->file('cv')->getClientOriginalName();
            $biodata->save();
        }
        if ($request->hasfile('surat_lamaran')) {
            $request->file('surat_lamaran')->move('pelamar/suratlamaran/', $request->file('surat_lamaran')->getClientOriginalName());
            $biodata->surat_lamaran = $request->file('surat_lamaran')->getClientOriginalName();
            $biodata->save();
        }
        if ($request->hasfile('ijazah')) {
            $request->file('ijazah')->move('pelamar/ijazah/', $request->file('ijazah')->getClientOriginalName());
            $biodata->ijazah = $request->file('ijazah')->getClientOriginalName();
            $biodata->save();
        }
        return redirect('pelamar/persetujuan')->with('update', 'Data berhasil diinput!');
    }

    public function persetujuan(Request $request, $id)
    {
        //dd($id);
        $biodata = \App\Models\Biodata::find($id);
        $biodata->status = 'waiting';
        $biodata->update($request->all());
        $this->validate($request, [
            'persetujuan' => 'required',
        ]);
        $arrayTostring = implode(',', $request->input('persetujuan'));
        $biodata['persetujuan'] = $biodata;


        return redirect('pelamar/final')->with('update', 'Data berhasil diinput!');
    }

    public function final(Request $request)
    {
        $id = Auth::id();
        $biodata = \App\Models\Biodata::where('user_id', $id)->get();
        return view('pelamar/final', ['biodata' => $biodata]);
    }

    public function akun(Request $request)
    {
        $user    =   auth()->user();

        if ($user->level == 'admin') {
            return view('akun.index', [
                'user' => $user
            ]);
        } else {
            return view('akun.indexuser', [
                'user' => $user
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateAkun(Request $request, $id)
    {
        $data = [
            'username'    => $request->username,
            'email'       => $request->email,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        User::where('id', $id)->update($data);

        return redirect()->back();
    }
}
