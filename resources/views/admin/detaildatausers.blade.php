<!-- resources/views/lowongan/lamar.blade.php -->

@extends('layouts.master')

@section('content')

    <section class="content">

        <div class="container mt-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Form Lamaran</h1>
                    </div>
                </div>
            </div>

            <form action="{{ route('updatestatus', $form->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nik">NIK:</label>
                    <input type="number" name="nik" class="form-control" value="{{@$form->nik}}" disabled required>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Lengkap:</label>
                    <input type="text" name="nama" class="form-control" value="{{@$form->nama}}" disabled required>
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin:</label>
                    <select name="jenis_kelamin" class="form-control" disabled required>
                        <option>{{@$form->jenis_kelamin}}</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tempat_lahir">Tempat Lahir:</label>
                    <input type="text" name="tempat_lahir" class="form-control" value="{{@$form->tempat_lahir}}" disabled required>
                </div>

                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir:</label>
                    <input type="date" name="tanggal_lahir" class="form-control" value="{{@$form->tanggal_lahir}}" disabled required>
                </div>

                <div class="form-group">
                    <label for="tingkat_pendidikan">Tingkat Pendidikan:</label>
                    <input type="text" name="tingkat_pendidikan" class="form-control" value="{{@$form->tingkat_pendidikan}}" disabled required>
                </div>

                <div class="form-group">
                    <label for="asal_sekolah">Asal Sekolah:</label>
                    <input type="text" name="asal_sekolah" class="form-control" value="{{@$form->asal_sekolah}}" disabled required>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <textarea name="alamat" class="form-control" value="{{@$form->alamat}}" disabled required>{{@$form->alamat}}</textarea>
                </div>

                <div class="form-group">
                    <label for="nomor_hp">Nomor HP:</label>
                    <input type="number" name="nomor_hp" class="form-control" value="{{@$form->nomor_hp}}" disabled required>
                </div>

                <div class="form-group">
                    <label for="epi">EPI:</label>
                    <input type="text" name="epi" class="form-control" value="{{@$form->epi}}" disabled required>
                </div>

                <div class="form-group">
                    <label for="pengalaman">Pengalaman:</label>
                    <textarea name="pengalaman" class="form-control" value="{{@$form->pengalaman}}" disabled required>{{@$form->pengalaman}}</textarea>
                </div>

                <div class="form-group">
                    <label for="sosmed">Sosial Media:</label>
                    <input type="text" name="sosmed" class="form-control" value="{{@$form->sosmed}}" disabled required>
                </div>

                <div class="form-group">
                    <label for="posisi">Posisi:</label>
                    <input type="text" name="posisi" class="form-control" value="{{@$form->posisi}}" disabled required>
                </div>

                <div class="form-group">
                    <label for="berkas">Berkas:</label>
                    {{-- @if($form->berkas) --}}
                        <a href="{{ asset('uploads/1704728468.pdf') }}" class="btn btn-primary" download>Download Berkas</a>
                    {{-- @else
                        <span class="text-danger">Tidak ada berkas yang diunggah</span>
                    @endif --}}
                </div>

                <div class="form-group">
                    <label for="status">Status:</label>
                    <select name="status" class="form-control" required>
                        <option disabled selected>Pilih Status</option>
                        <option value="witing"
                            {{ old('status', @$form->status) == 'witing' ? 'selected' : '' }}>
                                Witing</option>
                        <option value="diterima"
                            {{ old('status', @$form->status) == 'diterima' ? 'selected' : '' }}>
                                Diterima</option>
                        <option value="ditolak"
                            {{ old('status', @$form->status) == 'ditolak' ? 'selected' : '' }}>
                                Ditolak</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mb-4">Update Status</button>
            </form>
        </div>
    </section>

@endsection
