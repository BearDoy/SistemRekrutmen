<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Rekrutmen</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/assets/vendor/linearicons/style.css')}}">
  <link rel="stylesheet" href="{{asset('admin/assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap/bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/assets/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <style>
    .container {
       width: 30%;
       margin-top: 3%;
       box-shadow: 0 3px 20px rgba(0, 0, 0, 0.3);
       padding: 35px;
    }


    @media only screen and (max-width: 768px) {
        /* For mobile phones: */
        .container {
                width: 80%;
                margin-top: 25%;
                box-shadow: 0 3px 20px rgba(0, 0, 0, 0.3);
                padding: 35px;
                }
        }
</style>
</head>
<body class="hold-transition login-page">
    <div class="container">
        <div class="text-center">

            <form class="form-signin" action="/proseslogin" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <img class="mb-4" src="{{asset('admin/logobarufix.png')}}" alt="" width="72" height="72">
                    <h1 class="h3 mb-3 font-weight-normal" style="text-align: left;" >Login</h1>
                    <hr>
                    @if(session('gagal'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <i class="icon fas fa-times"></i>
                            {{session('gagal')}}
                        </div>
                    @endif
                    @if(session('sukses'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <i class="icon fas fa-check"></i>
                        {{session('sukses')}}
                    </div>
                    @endif
                        <div class="form-group">
                            <label for="username" class="sr-only">Username</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                            <input type="text" name="username" id="username" class="form-control" placeholder="username" required="" autofocus="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-unlock-alt"></i>
                                    </div>
                                </div>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="">
                            </div>
                        </div>
                    <button class="btn btn-lg btn-info btn-block" type="submit">Login</button>
                    <br>
                    <p>Belum punya akun ?<a href="/users/register"> daftar sekarang!</a></p>
                    <p class="mt-5 mb-3 text-muted">© 2023</p>
            </form>

        </div>

    </div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('admin/assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/assets/js/adminlte.min.js')}}"></script>

<script src="{{asset('admin/assets/js/demo.js')}}"></script>

</body>
</html>
