<!-- resources/views/lowongan/lamar.blade.php -->

@extends('layouts.master')

@section('content')

    <section class="content">

        <div class="container mt-4">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Akun</h1>
                    </div>
                </div>
            </div>

            <form action="{{ route('updateakunuser', $user->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" placeholder="Masukkan User" value="{{ old('username', @$user->username) }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" class="form-control" placeholder="Masukkan Email" value="{{ old('email', @$user->email) }}" required>
                </div>

                <div class="form-group">
                    <label for="password">Update Password:</label>
                    <input type="password" name="password" placeholder="Masukkan Password" class="form-control" >
                </div>

                <button type="submit" class="btn btn-primary">Update Akun</button>
            </form>
        </div>
    </section>

@endsection
