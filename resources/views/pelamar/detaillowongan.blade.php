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
            {{-- @foreach($lowongan_kerja as $lowongan) --}}
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
            {{-- @endforeach --}}
        </div>
    </div>
</section>

@endsection
