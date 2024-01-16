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
                        <h1>Upload File Pelamar</h1>
                    </div>
                    <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Biodata</a></li>
                        <li class="breadcrumb-item active">Upload File</li>
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
                        <button type="button" class="btn btn-info active">Upload File</button>
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
            <h3 class="card-title">Upload File</h3>
        </div>
    <div class="card">
        <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="alert alert-warning" role="alert">
                        <h5><i class="icon fas fa-exclamation-triangle"></i>Perhatian !</h5>
                        &rsaquo; Format nama file <strong> (NIKKTP_NAMALENGKAP) </strong>
                        <br>
                        &rsaquo; File tidak boleh lebih dari <strong> ukuran 2 MB </strong>
                        <br>
                        &rsaquo; File KTP harus berformat : <strong> jpeg,png,jpg </strong>
                        <br>
                        &rsaquo; CV, Surat Lamaran dan Ijazah Terakhir harus berformat : <strong> PDF </strong>
                        <br>
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                <form action="/pelamar/{{$bd->id}}/uploadfile" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" name="id" id="id" value="{{$bd->id}}">
                        <input type="hidden" name="user_id" id="user_id" value="{{$bd->user_id}}">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">KTP</label>
                            <div class="col-sm-4">
                                    <input type="file" class="form-control" id="file_ktp" name="file_ktp">
                            <a href="/pelamar/filektp/{{$bd->file_ktp}}" target="_blank"><p style="color: rgb(189, 10, 10);" value="{{$bd->file_ktp}}">{{$bd->file_ktp}}</p></a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Curriculum Vitae (CV)</label>
                            <div class="col-sm-4">
                                    <input type="file" class="form-control" id="cv" name="cv">
                            <a href="/pelamar/cv/{{$bd->cv}}" target="_blank"><p style="color: rgb(189, 10, 10);" value="{{$bd->cv}}">{{ $bd->cv}}</p></a>
                            </div>
                            
                           
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Surat Lamaran</label>
                            <div class="col-sm-4">
                                    <input type="file" class="form-control" id="surat_lamaran" name="surat_lamaran">
                            <a href="/pelamar/suratlamaran/{{$bd->surat_lamaran}}" target="_blank"><p style="color: rgb(189, 10, 10);" value="{{$bd->surat_lamaran}}">{{ $bd->surat_lamaran}}</p></a>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Ijazah Terakhir</label>
                            <div class="col-sm-4">
                                    <input type="file" class="form-control" id="ijazah" name="ijazah">
                            <a href="/pelamar/ijazah/{{$bd->ijazah}}" target="_blank"><p style="color: rgb(189, 10, 10);" value="{{$bd->ijazah}}">{{ $bd->ijazah}}</p></a>
                            </div>
                            
                            
        
                        </div>
                        <button type="submit" name="update" class="btn btn-info px-4 float-right">Submit</button>
                        <a href="/pelamar/biodata" class="btn btn-info px-4 float-left">Kembali</a>
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