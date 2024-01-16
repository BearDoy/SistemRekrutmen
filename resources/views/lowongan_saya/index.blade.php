@extends('layouts.master')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Pelamar</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">Pelamar</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div style="overflow-x: auto;">
                                <table id="DataTables" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIK KTP</th>
                                            <th>USERNAME</th>
                                            <th>NAMA LENGKAP</th>
                                            <th>POSISI</th>
                                            <th>Batch</th>
                                            <th>STATUS</th>
                                            @if (auth()->user()->level == 'admin')
                                                <th>AKSI</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lowongan_saya as $usar)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{ $usar->nik }}</td>
                                                <td>{{ $usar->username }}</td>
                                                <td>{{ $usar->nama }}</td>
                                                <td>{{ $usar->posisi }}</td>
                                                <td>{{ $usar->batch }}</td>
                                                <td>
                                                    @if ($usar->status == 'witing')
                                                        <button type="button" class="btn btn-primary">Witing</button>
                                                    @elseif($usar->status == 'diterima')
                                                        <button type="button" class="btn btn-success">Diterima</button>
                                                    @else
                                                        <button type="button" class="btn btn-danger">Ditolak</button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
    </section>
@endsection
