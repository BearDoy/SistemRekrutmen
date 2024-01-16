<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Rekrutmen</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('admin/assets/css/adminlte.min.css')}}">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <style>
    a, a:hover{
            color:#333
          }

        @media only screen and (max-width: 768px) {
            /* For mobile phones: */
            #pendidikan_terakhir {
                margin-left: 8.2%;
            }
            #cardbutton {
                margin: 0 auto;
            }
        }

        #overlay {
            position: fixed;
            display: none;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0,0,0,0.5);
            z-index: 2;
            cursor: pointer;
            }

            #text{
            position: absolute;
            top: 50%;
            left: 50%;
            font-size: 50px;
            color: lime;
            transform: translate(-50%,-50%);
            -ms-transform: translate(-50%,-50%);
            }

            #text2{
            position: absolute;
            top: 50%;
            left: 50%;
            font-size: 50px;
            color: rgb(202, 46, 46);
            transform: translate(-50%,-50%);
            -ms-transform: translate(-50%,-50%);
            }


  </style>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    @if ($biodata[0]['status'] == 'Diterima')
    <div class="container">
        <div id="overlay" onclick="off()">
            <div id="text" class="text-center">Selamat anda Diterima..!</div>
        </div>

        <div style="padding:300px">
            <h2 class="text-center">Klik Untuk Melihat Hasil Seleksi Anda</h2>
            <button class="btn btn-outline-info" onclick="on()">Pengumuman!</button>
            <a href="/logout" class="btn btn-outline-info btn-flat float-right" style="border-radius: 7px;">Keluar</a>
        </div>
    </div>
    @elseif ($biodata[0]['status'] == 'Ditolak')
    <div class="container">
        <div id="overlay" onclick="off()">
            <div id="text2" class="text-center">Mohon Maaf anda belum Diterima.</div>
        </div>

        <div style="padding:300px">
            <h2 class="text-center">Klik Untuk Melihat Hasil Seleksi Anda</h2>
            <button class="btn btn-outline-info" onclick="on()">Pengumuman!</button>
            <a href="/logout" class="btn btn-outline-info btn-flat float-right" style="border-radius: 7px;">Keluar</a>
        </div>
    </div>
    @else
    <div class="container">
    <nav class="navbar navbar-expand navbar-dark bg-info">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                    <img src="{{asset('admin/logobarufix.png')}}" alt="logo" class="brand-image img-circle elevation-3" style="width: 10%; margin-left: 5px;">
            </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto" style="margin-top: 5px;">
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="{{auth()->user()->getAvatar()}}" class="user-image img-circle elevation-2" alt="image">
                <span class="d-none d-md-inline" style="font-weight: bold;">{{auth()->user()->username}}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                  <!-- User image -->
                  <li class="user-header bg-info">
                    <img src="{{auth()->user()->getAvatar()}}" class="img-circle elevation-3" alt="User Image">

                    <p style="font-weight: bold;">
                      {{auth()->user()->username}}
                      <small>Member since {{auth()->user()->created_at->format("d F Y")}}</small>
                    </p>
                  </li>

                  <!-- Menu Footer-->
                  <li class="user-footer">
                    {{-- <a href="#" class="btn btn-default btn-flat">Profile</a> --}}
                    <a href="/" class="btn btn-default btn-flat float-right">Logout</a>
                  </li>
                </ul>
              </li>
        </ul>
    </nav>
</div>

<div class="container">
    <section class="content">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Biodata Pelamar</h1>
                    </div>
                    <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Biodata</a></li>
                        <!-- <li class="breadcrumb-item active">Biodata</li> -->
                    </ol>
                </div>
                </div>
            </div>
        </section>


        <div class="card">
            <div class="card-body d-flex justify-content-center" id="#cardbutton">
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="btn btn-info active">Biodata</button>
                        <i class="fas fa-arrow-right"></i>
                        <button type="button" class="btn btn-info" disabled>Upload File</button>
                        <i class="fas fa-arrow-right"></i>
                        <button type="button" class="btn btn-info" disabled>Persetujuan</button>
                        <i class="fas fa-arrow-right"></i>
                        <button type="button" class="btn btn-info" disabled>Selesai</button>
                    </div>
                </div>
            </div>
        </div>


            @if(session('update'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fas fa-check"></i>
                {{session('update')}}
            </div>
            @endif

<div class="container-fluid">
<div class="row">
<div class="col-md-2">
<!-- Profile Image -->
@foreach ($biodata as $bds)
    <div class="card card-info card-outline">
        <div class="card-body box-profile">
            <div class="text-center">
                <img class="profile-user-img img-fluid img-circle"
                    src="{{auth()->user()->getAvatar()}}"
                    alt="User profile picture">
            </div>
            <h3 class="profile-username text-center">{{$bds->user->username}}</h3>
            <div class="text-center">
            <strong class="text-center">Melamar Sebagai</strong>
            </div>
            <p class="text-muted text-center">{{$bds->user->melamar_sebagai}}</p>
        </div>
    </div>
    @endforeach
</div>

@foreach ($biodata as $bd)
<div class="col-md-10">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Lengkapi Biodata</h3>
        </div>
    <div class="card">
        <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto">
                <form action="/pelamar/{{$bd->id}}/update" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        @if ($errors->any())
                            <div class="alert alert-warning alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <input type="hidden" name="id" id="id" value="{{$bd->id}}">
                        <input type="hidden" name="user_id" id="user_id" value="{{$bd->user_id}}">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">NIK KTP</label>

                            <div class="col-md-4">
                                <input type="text" class="form-control" id="no_ktp" name="no_ktp" value="{{$bd->user->no_ktp}}" readonly>
                            </div>
                            <label class="col-md-2 col-form-label">Status Perkawinan</label>

                            <div class="col-md-3">
                                <select class="form-control" name="status_nikah" id="status_nikah">
                                    <option value="Single" @if($bd->status_nikah == 'Single') selected @endif>Single</option>
                                    <option value="Menikah" @if($bd->status_nikah == 'Menikah') selected @endif>Menikah</option>
                                    <option value="Duda" @if($bd->status_nikah == 'Duda') selected @endif>Duda</option>
                                    <option value="Janda" @if($bd->status_nikah == 'Janda') selected @endif>Janda</option>
                                </select>
                            </div>


                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Nama Lengkap</label>

                            <div class="col-md-4">
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{$bd->nama_lengkap}}">
                            </div>
                            <label class="col-md-2 col-form-label">No NPWP</label>

                            <div class="col-md-4">
                                <input type="text" class="form-control" id="no_npwp" name="no_npwp" value="{{$bd->no_npwp}}">
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Tempat Lahir</label>

                            <div class="col-md-4">
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{$bd->tempat_lahir}}">
                            </div>

                            <label class="col-md-3 col-form-label">Pendidikan Terakhir</label>

                            <div class="col-md-2" style="margin-left: -8.2%;" id="#pendidikan_terakhir">
                                <select class="form-control" name="pendidikan_terakhir" id="pendidikan_terakhir">
                                    <option value="D3" @if($bd->pendidikan_terakhir == 'D3') selected @endif>D3</option>
                                    <option value="S1" @if($bd->pendidikan_terakhir == 'S1') selected @endif>S1</option>
                                    <option value="S2" @if($bd->pendidikan_terakhir == 'S2') selected @endif>S2</option>
                                    <option value="S3" @if($bd->pendidikan_terakhir == 'S3') selected @endif>S3</option>
                                </select>
                            </div>

                        </div>
                        <div class="form-group row">

                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Tanggal Lahir</label>

                            <div class="col-md-4">
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{$bd->tanggal_lahir}}">
                                <small style="color: red;"> *Bulan/Hari/Tahun</small>
                            </div>


                        </div>
                        <div class="form-group row">

                            <label class="col-md-2 col-form-label">Agama</label>
                            <div class="col-md-3">
                                <select class="form-control" name="agama" id="agama">
                                    <option value="Islam" @if($bd->agama == 'Islam') selected @endif>Islam</option>
                                    <option value="Protestan"@if($bd->agama == 'Protestan') selected @endif>Protestan</option>
                                    <option value="Katolik" @if($bd->agama == 'Katolik') selected @endif>Katolik</option>
                                    <option value="Hindu" @if($bd->agama == 'Hindu') selected @endif>Hindu</option>
                                    <option value="Buddha" @if($bd->agama == 'Buddha') selected @endif>Buddha</option>
                                    <option value="Khonghucu" @if($bd->agama == 'Khonghucu') selected @endif>Khonghucu</option>
                                </select>
                            </div>

                        </div>
                        <div class="form-group row">

                            <label class="col-md-2 col-form-label">Alamat</label>

                            <div class="col-md-4">
                                <textarea type="text" class="form-control" id="alamat" rows="3" name="alamat">{{$bd->alamat}}</textarea>
                            </div>

                        </div>
                        <div class="form-group row">

                            <label class="col-md-2 col-form-label">Kode Pos</label>

                            <div class="col-md-2">
                                <input type="text" class="form-control" id="kode_pos" name="kode_pos" value="{{$bd->kode_pos}}">
                            </div>
                        </div>


                        <div class="form-group row">

                            <label class="col-md-2 col-form-label">Nomor Telepon / HP</label>

                            <div class="col-md-4">
                                <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" value="{{$bd->nomor_telepon}}">
                            </div>


                        </div>
                        <div class="form-group row">

                            <label class="col-md-2 col-form-label">Jenis Kelamin</label>

                            <div class="form-check form-check-inline ml-3">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="exampleRadios1" value="L" @if($bd->jenis_kelamin == 'L') checked @endif>
                                <label class="form-check-label" for="exampleRadios1">
                                Laki - Laki
                                </label>
                            </div>
                            <div class="form-check form-check-inline ml-4">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="exampleRadios2" value="P" @if($bd->jenis_kelamin == 'P') checked @endif>
                                <label class="form-check-label" for="exampleRadios2">
                                    Perempuan
                                </label>
                            </div>

                        </div>
                        <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Warga Negara</label>

                            <div class="col-sm-4">
                                <select class="form-control" name="warga_negara" id="warga_negara">
                                    <option value="Warga Negara Indonesia" @if($bd->warga_negara == 'Warga Negara Indonesia') selected @endif>Warga Negara Indonesia</option>
                                    <option value="Warga Negara Asing"@if($bd->warga_negara == 'Warga Negara Asing') selected @endif>Warga Negara Asing</option>
                                </select>
                            </div>

                        </div>
                        <button type="submit" name="update" class="btn btn-info px-4 float-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
@endforeach
</section>

<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2023 <a>Kelompok 5</a>.</strong> All rights
    reserved.
</footer>
@endif
    </div>



   <!-- jQuery -->
   <script src="{{asset('admin/assets/plugins/jquery/jquery.min.js')}}"></script>
   <!-- Bootstrap 4 -->
   <script src="{{asset('admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
   <!-- AdminLTE App -->
   <script src="{{asset('admin/assets/js/adminlte.min.js')}}"></script>
   <!-- AdminLTE for demo purposes -->
   <script src="{{asset('admin/assets/js/demo.js')}}"></script>

<script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if($('#show_hide_password input').attr("type") == "text"){
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass( "fa-eye-slash" );
                    $('#show_hide_password i').removeClass( "fa-eye" );
                }else if($('#show_hide_password input').attr("type") == "password"){
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass( "fa-eye-slash" );
                    $('#show_hide_password i').addClass( "fa-eye" );
                }
            });
        });

        function on() {
            document.getElementById("overlay").style.display = "block";
            }

            function off() {
            document.getElementById("overlay").style.display = "none";
            }
</script>
</body>
</html>
