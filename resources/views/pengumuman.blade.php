<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Rekrutmen Pegawai Baru</title>
        <!-- Favicon-->
        
        <link rel="icon" type="image/x-icon" href="{{asset('admin/logobarufix.png')}}"/>
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('pelamar/css/styles.css')}}" rel="stylesheet"/>
        <style>
        </style>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="/rekrutmen">Rekruitmen Pegawai</a>
                <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="/rekrutmen/#portfolio">Lowongan</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="/rekrutmen/#about">Syarat & Ketentuan</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="/rekrutmen/#contact">Lamar</a></li>
                        <li><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="/pengumuman">Pengumuman</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Contact Section-->
        <section class="page-section" id="contact">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-5" style="margin-top: 100px;">Pengumuman Hasil Seleksi Gelombang 1</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                </div>
                <!-- Contact Section Form-->
                <div class="row">
                    <table class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>NAMA LENGKAP</th>
                            <th>Posisi</th>
                            <th class="text-center">STATUS</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($user as $bdi)
                          <tr>
                            <td>{{$bdi->biodata->nama_lengkap}}</td>
                            <td>{{$bdi->melamar_sebagai}}</td>
                            <td class="text-center">
                                @switch($bdi)
                                        @case($bdi->biodata->status == 'Diterima')
                                            <button class="btn btn-success"><i>{{$bdi->biodata->status}}</i></button>
                                            @break
                                        @case($bdi->biodata->status == 'Ditolak')
                                            <button class="btn btn-danger"><i>{{$bdi->biodata->status}}</i></button>
                                            @break
                                        @default
                                            @if ($bdi->biodata->status != "")
                                                <a href="#">
                                                <button class="btn btn-warning"><i>{{$bdi->biodata->status}}</i></button>
                                                </a>
                                            @else
                                            @endif
                                    @endswitch
                            </td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </section>

        <!-- Footer-->
        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Location</h4>
                        <p class="lead mb-0">
                            Jl. RS. Fatmawati Raya, Pondok. Labu
                            <br />
                            Kec. Cilandak, Kota Depok, Jawa Barat 12450
                        </p>
                    </div>
                    <!-- Footer Social Icons-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Follow Us</h4>
                        <a target="_blank" class="btn btn-outline-light btn-social mx-1" href="#"><i class="fab fa-fw fa-facebook-f"></i></a>
                        <a target="_blank" class="btn btn-outline-light btn-social mx-1" href="#"><i class="fab fa-fw fa-twitter"></i></a>
                        <a target="_blank" class="btn btn-outline-light btn-social mx-1" href="#"><i class="fab fa-fw fa-instagram"></i></a>
                    </div>
                    <!-- Footer About Text-->
                    <div class="col-lg-4">
                        <h4 class="text-uppercase mb-4">Tautan / Links</h4>
                        <p class="lead mb-0">
                            <a target="_blank" href="#">Portal Link</a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright © Gusti Wahyu Putra 2020</small></div>
        </div>
        <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
        <div class="scroll-to-top d-lg-none position-fixed">
            <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
        </div>

        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="{{asset('pelamar/assets/mail/jqBootstrapValidation.js')}}"></script>
        <script src="{{asset('pelamar/assets/mail/contact_me.js')}}"></script>
        <!-- Core theme JS-->
        <script src="{{asset('pelamar/js/scripts.js')}}"></script>
    </body>
</html>
