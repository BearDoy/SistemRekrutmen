@extends('layouts.master')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Lowongan Kerja</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active">Lowongan Kerja</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Section untuk menampilkan kotak kecil dengan data lowongan kerja -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        {{-- <button type="button" class="btn btn-md btn-primary" data-toggle="modal"
                            data-target="#exampleModal" style="margin-bottom: 15px;">
                            <i class="fas fa-plus"></i> Tambah Admin
                        </button> --}}
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div style="overflow-x: auto;">
                            <table id="DataTables" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>POSISI</th>
                                        <th>SEPARTEMEN</th>
                                        <th>PERSYARATAN</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lowongan_kerja as $lowongan)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ $lowongan->posisi }}</td>
                                            <td>{{ $lowongan->departemen->nama_departemen }}</td>
                                            <td>{{ $lowongan->persyaratan }}</td>
                                            <td>
                                                <a href="/lowongan/detail/{{ $lowongan->id }}" class="btn btn-secondary">Detail</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Modal Tambah User -->
                    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Admin</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="/admin/create" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label>NIK KTP</label>
                                            <input type="text" name="no_ktp" id="no_ktp" class="form-control"
                                                id="exampleFormControlInput1" placeholder="NIK KTP">
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" name="username" id="username" class="form-control"
                                                id="exampleFormControlInput2" placeholder="masukan username">
                                        </div>
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input type="email" name="email" id="email" class="form-control"
                                                id="exampleFormControlInput3" placeholder="name@example.com">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="remember_token" id="remember_token"
                                                class="form-control" placeholder="{{ csrf_token() }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Satker</label>
                                            <select class="form-control" name="satker" id="satker">
                                                <option>UPT BAHASA</option>
                                                <option>UPT PERPUSTAKAAN</option>
                                                <option>UPT PP & K</option>
                                                <option>UPT TEKNOLOGI INFORMASI</option>
                                                <option>UPT LAB TERPADU</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Level</label>
                                            <select class="form-control" name="level" id="level">
                                                <option>admin</option>
                                                <option>user</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <div class="input-group" id="show_hide_password">
                                                <input type="password" class="form-control" name="password"
                                                    id="password" placeholder="password">
                                                <div class="input-group-text">
                                                    <a href="#"><i class="fas fa-eye-slash"
                                                            aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Image</label>
                                            <input type="file" name="image" class="form-control"
                                                aria-describedby="text" id="image">
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div> --}}
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
</section>

{{-- <section class="content">
    <div class="container-fluid">
        <div class="row">
            @foreach($lowongan_kerja as $lowongan)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ $lowongan->posisi }}</h3>
                        </div>
                        <div class="card-body">
                            <p>Departemen: {{ $lowongan->departemen->nama_departemen }}</p>
                            <p>Persyaratan: {{ $lowongan->persyaratan }}</p>
                            <p>Tugas: {{ $lowongan->tugas }}</p>
                            <a href="{{ route('lowongan_kerja.form', ['id' => $lowongan->id]) }}" class="btn btn-primary ms-auto">Lamar Sekarang</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section> --}}

@endsection
