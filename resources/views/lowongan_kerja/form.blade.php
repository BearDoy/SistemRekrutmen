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
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('lowongan_kerja.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="lowongan_id" value="{{ $lowongan->id }}">
                <div class="form-group">
                    <label for="nik">NIK:</label>
                    <input type="number" name="nik" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Lengkap:</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin:</label>
                    <select name="jenis_kelamin" class="form-control" required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tempat_lahir">Tempat Lahir:</label>
                    <input type="text" name="tempat_lahir" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir:</label>
                    <input type="date" name="tanggal_lahir" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="tingkat_pendidikan">Tingkat Pendidikan:</label>
                    <input type="text" name="tingkat_pendidikan" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="asal_sekolah">Asal Sekolah:</label>
                    <input type="text" name="asal_sekolah" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <textarea name="alamat" class="form-control" required></textarea>
                </div>

                <div class="form-group">
                    <label for="nomor_hp">Nomor HP:</label>
                    <input type="number" name="nomor_hp" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="epi">EPI:</label>
                    <input type="text" name="epi" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="pengalaman">Pengalaman:</label>
                    <textarea name="pengalaman" class="form-control" required></textarea>
                </div>

                <div class="form-group">
                    <label for="sosmed">Sosial Media:</label>
                    <input type="text" name="sosmed" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="berkas">Berkas:</label>
                    <input type="file" name="berkas" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Kirim Lamaran</button>
            </form>
        </div>
    </section>

@endsection
