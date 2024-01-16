<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="user-panel mt-4 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('admin/logobarufix.png') }}" alt="logo" class="brand-image img-circle elevation-3"
                    style="opacity: .7; margin-top: 5px;">
            </div>
            <div class="info">
                <span class="brand-text font-weight-bold" style="color: white; opacity: .8;">Rekrutmen Pegawai</span>
                <br>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @if (auth()->user()->level === 'admin')
                    <li class="nav-item has-treeview">
                        <a href="/home" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Home
                            </p>
                        </a>

                    <li class="nav-item has-treeview">
                        <a href="/akun" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Akun
                            </p>
                        </a>
                        <span class="brand-text font-weight-bold" style="color: white; opacity: .8;">Lowongan</span>
                    <li class="nav-item has-treeview">
                        <a href="/admin/datausers" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Pelamar
                            </p>
                        </a>
                    <li class="nav-item has-treeview">
                        {{-- <a href="/admin/datausers" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Laporan
                            </p>
                        </a> --}}
                        <span class="brand-text font-weight-bold" style="color: white; opacity: .8;">Manajemen</span>
                    <li class="nav-item has-treeview">
                        <a href="/batches" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Batch
                            </p>
                        </a>
                    <li class="nav-item has-treeview">
                        <a href="/departemens" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Departemen
                            </p>
                        </a>
                    <li class="nav-item has-treeview">
                        <a href="/lowongan_kerja" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Lowongan
                            </p>
                        </a>
                    @else
                    <li class="nav-item has-treeview">
                        <a href="/dashboard" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Home
                            </p>
                        </a>

                    <li class="nav-item has-treeview">
                        <a href="/akunuser" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Akun
                            </p>
                        </a>
                        <span class="brand-text font-weight-bold" style="color: white; opacity: .8;">Lowongan</span>
                    <li class="nav-item has-treeview">
                        <a href="/lowongan_posting" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Lowongan
                            </p>
                        </a>
                    <li class="nav-item has-treeview">
                        <a href="/lowongan_saya" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Lamaran Saya
                            </p>
                        </a>
                @endif


</aside>
