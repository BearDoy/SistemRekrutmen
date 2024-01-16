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

        /*@media only screen and (max-width: 768px) {
        
        .container {
                width: 80%;
                margin-top: 25%;
                box-shadow: 0 3px 20px rgba(0, 0, 0, 0.3);
                padding: 35px;
                }
        }
        */
        @media only screen and (max-width: 768px) {
            /* For mobile phones: */
            #pendidikan_terakhir {
                margin-left: 8.2%;
            
            }
        }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
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
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                    <a href="/logout" class="btn btn-default btn-flat float-right">Logout</a>
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
                        <h1>Persetujuan Pelamar</h1>
                    </div>
                    <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Biodata</></li>
                        <li class="breadcrumb-item">Upload File</li>
                        <li class="breadcrumb-item active">Persetujuan</li>
                    </ol>
                </div>
                </div>
            </div>
        </section>

    
        <div class="card" style="text-align:center;">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="btn btn-info" disabled>Biodata</button>
                        <i class="fas fa-arrow-right"></i>
                        <button type="button" class="btn btn-info" disabled>Upload File</button>
                        <i class="fas fa-arrow-right"></i>
                        <button type="button" class="btn btn-info active">Persetujuan</button>
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
            <h3 class="profile-username text-center">{{$bds->nama_lengkap}}</h3>
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
            <h3 class="card-title">Persetujuan</h3>
        </div>
    <div class="card">
        <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto">
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
                <form action="/pelamar/{{$bd->id}}/persetujuan" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="id" id="id" value="{{$bd->id}}" readonly>
                        <input type="hidden" name="user_id" id="user_id" value="{{$bd->user_id}}" readonly>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">NIK KTP</label>
                           
                           <div class="col-md-4">
                               <input type="text" class="form-control" id="no_ktp" name="no_ktp" value="{{$bd->user->no_ktp}}" readonly>
                           </div>
                           <label class="col-md-2 col-form-label">Status Perkawinan</label>
                           
                           <div class="col-md-3">
                               <select class="form-control" name="status_nikah" id="status_nikah" disabled="true">
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
                               <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{$bd->nama_lengkap}}" readonly>
                           </div>
                           <label class="col-md-2 col-form-label">No NPWP</label>
                           
                           <div class="col-md-4">
                               <input type="text" class="form-control" id="no_npwp" name="no_npwp" value="{{$bd->no_npwp}}" readonly>
                           </div>
                          
                       </div>
                       <div class="form-group row">
                           <label class="col-md-2 col-form-label">Tempat Lahir</label>
                           
                           <div class="col-md-4">
                               <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{$bd->tempat_lahir}}" readonly>
                           </div>
                           
                           <label class="col-md-3 col-form-label">Pendidikan Terakhir</label>
                           
                           <div class="col-md-2" style="margin-left: -8.2%;" id="#pendidikan_terakhir">
                               <select class="form-control" name="pendidikan_terakhir" id="pendidikan_terakhir" disabled="true">
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
                               <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{$bd->tanggal_lahir}}" readonly>
                               <small style="color: red;"> *Bulan/Hari/Tahun</small>
                           </div>

                           <label class="col-md-2 col-form-label">KTP</label>
                            <div class="col-sm-4">
                                    <input type="file" class="form-control" id="file_ktp" name="file_ktp" disabled="true">
                            <a href="/pelamar/filektp/{{$bd->file_ktp}}" target="_blank"><p style="color: rgb(189, 10, 10);" value="{{$bd->file_ktp}}">{{ $bd->file_ktp}}</p></a>
                            </div>
                          
                       </div>
                       <div class="form-group row">
                           
                           <label class="col-md-2 col-form-label">Agama</label>
                           <div class="col-md-3">
                               <select class="form-control" name="agama" id="agama" disabled="true">
                                   <option value="Islam" @if($bd->agama == 'Islam') selected @endif>Islam</option>
                                   <option value="Protestan"@if($bd->agama == 'Protestan') selected @endif>Protestan</option>
                                   <option value="Katolik" @if($bd->agama == 'Katolik') selected @endif>Katolik</option>
                                   <option value="Hindu" @if($bd->agama == 'Hindu') selected @endif>Hindu</option>
                                   <option value="Buddha" @if($bd->agama == 'Buddha') selected @endif>Buddha</option>
                                   <option value="Khonghucu" @if($bd->agama == 'Khonghucu') selected @endif>Khonghucu</option>
                               </select>
                           </div>

                           <label class="col-md-2 col-form-label" style="margin-left: 73px;">Curriculum Vitae (CV)</label>
                            <div class="col-sm-4">
                                    <input type="file" class="form-control" id="cv" name="cv" disabled="true">
                            <a href="/pelamar/cv/{{$bd->cv}}" target="_blank"><p style="color: rgb(189, 10, 10);" value="{{$bd->cv}}">{{ $bd->cv}}</p></a>
                            </div>
                           
                       </div>
                       <div class="form-group row">
                           
                           <label class="col-md-2 col-form-label">Alamat</label>
                           
                           <div class="col-md-4">
                               <textarea type="text" class="form-control" id="alamat" rows="3" name="alamat" readonly>{{$bd->alamat}}</textarea>
                           </div>

                           <label class="col-md-2 col-form-label">Surat Lamaran</label>
                            <div class="col-sm-4">
                                    <input type="file" class="form-control" id="surat_lamaran" name="surat_lamaran" disabled="true">
                            <a href="/pelamar/suratlamaran/{{$bd->surat_lamaran}}" target="_blank"><p style="color: rgb(189, 10, 10);" value="{{$bd->surat_lamaran}}">{{ $bd->surat_lamaran}}</p></a>
                            </div>
                           
                       </div>
                       <div class="form-group row">
                           
                           <label class="col-md-2 col-form-label">Kode Pos</label>
                           
                           <div class="col-md-2">
                               <input type="text" class="form-control" id="kode_pos" name="kode_pos" value="{{$bd->kode_pos}}" readonly>
                           </div>
                       

                       <label class="col-md-2 col-form-label" style="margin-left: 147px;">Ijazah Terakhir</label>
                            <div class="col-sm-4">
                                    <input type="file" class="form-control" id="ijazah" name="ijazah" disabled="true">
                            <a href="/pelamar/ijazah/{{$bd->ijazah}}" target="_blank"><p style="color: rgb(189, 10, 10);" value="{{$bd->ijazah}}">{{ $bd->ijazah}}</p></a>
                            </div>

                        </div>
                       <div class="form-group row">
                           
                           <label class="col-md-2 col-form-label">Nomor Telepon / HP</label>
                           
                           <div class="col-md-4">
                               <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" value="{{$bd->nomor_telepon}}" readonly>
                           </div>
                           
                           
                       </div>
                       <div class="form-group row">
                           
                           <label class="col-md-2 col-form-label">Jenis Kelamin</label>
                          
                           <div class="form-check form-check-inline ml-3">
                               <input class="form-check-input" type="radio" name="jenis_kelamin" id="exampleRadios1" value="L" @if($bd->jenis_kelamin == 'L') checked @endif disabled="true">
                               <label class="form-check-label" for="exampleRadios1">
                               Laki - Laki
                               </label>
                           </div>
                           <div class="form-check form-check-inline ml-4">
                               <input class="form-check-input" type="radio" name="jenis_kelamin" id="exampleRadios2" value="P" @if($bd->jenis_kelamin == 'P') checked @endif disabled="true">
                               <label class="form-check-label" for="exampleRadios2">
                                   Perempuan
                               </label>
                           </div>
                       </div>
                       <div class="form-group row">
                         
                           <label class="col-sm-2 col-form-label">Warga Negara</label>
                           
                           <div class="col-sm-4">
                               <select class="form-control" name="warga_negara" id="warga_negara" disabled="true">
                                   <option value="Warga Negara Indonesia" @if($bd->warga_negara == 'Warga Negara Indonesia') selected @endif>Warga Negara Indonesia</option>
                                   <option value="Warga Negara Asing"@if($bd->warga_negara == 'Warga Negara Asing') selected @endif>Warga Negara Asing</option>
                               </select>
                           </div>
                          
                       </div>
                       <br>
                        <div class="form-group row">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input col-md-5" id="customCheck" name="persetujuan[]" value="setuju" @if($bd->persetujuan == 'setuju') checked @endif>
                                <label class="custom-control-label" for="customCheck" style="margin-left: 35px; color: red;">Berdasarkan Data Diatas Saya Siap Mengikuti Peraturan Yang Ada Dilingkungan Universitas Pembangunan Nasional "Veteran" Jakarta</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input col-md-5" id="customCheck1" name="persetujuan[]" value="setuju" @if($bd->persetujuan == 'setuju') checked @endif>
                                <label class="custom-control-label" for="customCheck1" style="margin-left: 35px; color: red;">Saya Mengisi Biodata Dalam Keadaan Sadar dan Siap</label>
                            </div>
                        </div>
                        <button type="submit" name="update" class="btn btn-info px-4 float-right">Submit</button>
                        <a href="/pelamar/uploadfile" class="btn btn-info px-4 float-left">Kembali</a>
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
        <b>Version</b> 4.0
    </div>
    <strong>Copyright &copy; 2020 <a href="https://www.linkedin.com/in/gusti-wahyu-putra/">Gusti Wahyu Putra</a>.</strong> All rights
    reserved.
</footer>

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
</script>
</body>
</html>