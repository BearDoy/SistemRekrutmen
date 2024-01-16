<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Kepegawaian</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('admin/assets/css/adminlte.min.css')}}">
  
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <style>
    a, a:hover{
            color:#333
          }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

<!-- Navbar -->
@include('layouts.includes.navbar')
<!-- /.navbar -->

<!-- sidebar -->

@include('layouts.includes.sidebar')
<!-- /.sidebar -->


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @yield('content')
</div>
<!-- /.content-wrapper -->


 <!-- footer -->
 @include('layouts.includes.footer')
 <!-- /footer -->

<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


   <!-- jQuery -->
   <script src="{{asset('admin/assets/plugins/jquery/jquery.min.js')}}"></script>
   <!-- Bootstrap 4 -->
   <script src="{{asset('admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
   <!-- AdminLTE App -->
   <script src="{{asset('admin/assets/js/adminlte.min.js')}}"></script>
   <!-- AdminLTE for demo purposes -->
   <script src="{{asset('admin/assets/js/demo.js')}}"></script>

   <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>


<script>
  $(document).ready(function() {
    $('#DataTables').DataTable();

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
