<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Registration</title>
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
       width: 35%;
       margin-top: 30px;
       box-shadow: 0 3px 20px rgba(0, 0, 0, 0.3);
       padding: 40px;
       margin-bottom: 80px;
    }


    @media only screen and (max-width: 768px) {
        /* For mobile phones: */
        .container {
                width: 85%;
                margin-top: 15px;
                box-shadow: 0 3px 20px rgba(0, 0, 0, 0.3);
                padding: 30px;
                }
        }
</style>
</head>
<body class="hold-transition login-page">
    <div class="container">
        <div class="text-center">
            <form action="/users/register" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <img class="mb-4" src="{{asset('admin/logobarufix.png')}}" alt="" width="72" height="72">
                    <h1 class="h3 mb-3 font-weight-normal" style="text-align: left;">Registrasi</h1>
                    <hr>
                    @if(session('gagal'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <i class="icon fas fa-times"></i>
                            {{session('gagal')}}
                        </div>
                    @endif
                {{-- <input type="hidden" name="id" id="id" value="">
                <input type="hidden" name="nip" id="nip" value=""> --}}

                <div class="form-group">
                    <label class="px-6 float-left">Username</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" required="" autofocus="">
                    </div>
                    @if ($errors->first())
                    <small style="color:red; margin-left: -20px;">{{$errors->first('username')}}</small>
                    @endif
                </div>

                <div class="form-group">
                    <label class="px-6 float-left">Email</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-at"></i>
                            </div>
                        </div>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Name@example.com" required="" autofocus="">
                    </div>
                    @if ($errors->first())
                    <small style="color:red; margin-left: -20px;">{{$errors->first('email')}}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label class="px-6 float-left">Password</label>
                    <div class="input-group" id="show_hide_password1">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-key"></i>
                            </div>
                        </div>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="" autofocus="">
                    <div class="input-group-text">
                        <a href="#"><i class="fas fa-eye-slash" aria-hidden="true"></i></a>
                    </div>
                </div>
                    @if ($errors->first())
                        <small style="color:red; margin-left: -20px;">{{$errors->first('password')}}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label class="px-6 float-left">Konfirmasi Password</label>
                    <div class="input-group" id="show_hide_password2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-key"></i>
                            </div>
                        </div>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Konfirmasi Password" required="" autofocus="">
                    <div class="input-group-text">
                        <a href="#"><i class="fas fa-eye-slash" aria-hidden="true"></i></a>
                    </div>
                </div>
                    @if ($errors->first())
                    <small style="color:red; margin-left: -20px;">{{$errors->first('confirm_password')}}</small>
                    @endif
                </div>

                </div>
                <button type="submit" class="btn btn-info px-4 float-right">Submit</button>
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
<script>
    $(document).ready(function() {
      $("#show_hide_password1 a").on('click', function(event) {
          event.preventDefault();
          if($('#show_hide_password1 input').attr("type") == "text"){
              $('#show_hide_password1 input').attr('type', 'password');
              $('#show_hide_password1 i').addClass( "fa-eye-slash" );
              $('#show_hide_password1 i').removeClass( "fa-eye" );
          }else if($('#show_hide_password1 input').attr("type") == "password"){
              $('#show_hide_password1 input').attr('type', 'text');
              $('#show_hide_password1 i').removeClass( "fa-eye-slash" );
              $('#show_hide_password1 i').addClass( "fa-eye" );
          }
      });
  });

  $(document).ready(function() {
      $("#show_hide_password2 a").on('click', function(event) {
          event.preventDefault();
          if($('#show_hide_password2 input').attr("type") == "text"){
              $('#show_hide_password2 input').attr('type', 'password');
              $('#show_hide_password2 i').addClass( "fa-eye-slash" );
              $('#show_hide_password2 i').removeClass( "fa-eye" );
          }else if($('#show_hide_password2 input').attr("type") == "password"){
              $('#show_hide_password2 input').attr('type', 'text');
              $('#show_hide_password2 i').removeClass( "fa-eye-slash" );
              $('#show_hide_password2 i').addClass( "fa-eye" );
          }
      });
  });
</script>


</body>
</html>
view regis
