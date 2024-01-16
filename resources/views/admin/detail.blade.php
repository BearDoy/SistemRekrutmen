@extends('layouts.master')

@section('content')

<div class="main-content">
  <div class="container">
        <div class="container-fluid">
              <div class="row">
                @foreach ($biodata as $bda)
                <div class="col-md-3">
                      <div class="card card-info card-outline">
                            <div class="card-body box-profile">
                              <div class="text-center">
                                <h3 class="profile-username text-center">Photo Profile</h3>
                                <p class="text-muted text-center">Ketuk untuk melihat</p>
                                <a href="/pelamar/images/{{$bda->user->image}}" target="_blank">
                                <img class="profile-user-img img-fluid img-thumbnail" src="/pelamar/images/{{$bda->user->image}}" alt="image">
                                </a>
                              </div>
                              
                              <h3 class="profile-username text-center">{{$bda->nama_lengkap}}</h3>
                              <p class="text-muted text-center">{{$bda->user->melamar_sebagai}}</p>
                            </div>
                            <div class="text-center">
                            <a href="/admin/datausers">
                              <button type="submit" class="btn btn-info" style="margin-bottom: 15px;" aria-hidden="true">Kembali</button>
                            </a>
                            </div>
                      </div>
                </div>
                      <div class="col-md-9">
                        <div class="card card-info">
                            <div class="card-header">
                              <h3 class="card-title">Keterangan</h3>
                            </div>
                      <!-- /.card-header -->
                            <div class="card-body">
                              <div class="container">
                                <div class="row">
                                  <!-- div 2 -->
                                  <div class="col-sm">
                                  <strong><i class="fas fa-star-and-crescent mr-1"></i> Agama</strong>
                  
                                  <p class="text-muted">
                                    {{$bda->agama}}
                                  </p>
                  
                                  <hr>
                  
                                  <strong><i class="fas fa-road mr-1"></i> Alamat</strong>
                  
                                  <p class="text-muted">
                                    {{$bda->alamat}}
                                  </p>
                  
                                  <hr>
                  
                                  <strong><i class="fas fa-archway mr-1"></i> Kode Pos</strong>
                  
                                  <p class="text-muted">
                                    {{$bda->kode_pos}}
                                  </p>

                                  <hr>
                  
                                  <strong><i class="fas fa-place-of-worship mr-1"></i> Tempat Lahir</strong>
                  
                                  <p class="text-muted">
                                    {{$bda->tempat_lahir}}
                                  </p>

                                  <hr>
                  
                                  <strong><i class="far fa-calendar-alt mr-1"></i> Tanggal Lahir</strong>
                  
                                  <p class="text-muted">{{date('d F Y', strtotime($bda->tanggal_lahir))}}</p>

                                  <hr>
                  
                                  <strong><i class="fas fa-credit-card mr-1"></i> NO NPWP</strong>
                  
                                  <p class="text-muted">
                                    {{$bda->no_npwp}}
                                  </p>

                                  <hr>
                  
                                  <strong><i class="fas fa-graduation-cap mr-1"></i> Pendidikan Terakhir</strong>
                  
                                  <p class="text-muted">
                                    {{$bda->pendidikan_terakhir}}
                                  </p>
                                </div>
                            <!-- /div 2 -->
                              <hr>
                              <!-- div 2 -->
                                <div class="col-sm">
                                  <strong><i class="fas fa-phone mr-1"></i> Nomor Telepon / HP</strong>
                  
                                  <p class="text-muted">
                                    {{$bda->nomor_telepon}}
                                  </p>

                                  <hr>
                  
                                  <strong><i class="fas fa-flag mr-1"></i> Warga Negara</strong>
                  
                                  <p class="text-muted">
                                    {{$bda->warga_negara}}
                                  </p>

                                  <hr>
                  
                                  <strong><i class="fas fa-id-card mr-1"></i> KTP</strong>
                                  <a href="/pelamar/filektp/{{$bda->file_ktp}}" target="_blank">
                                  <p style="color: green;">
                                    {{$bda->file_ktp}}
                                  </p>
                                  </a>

                                  <hr>
                  
                                  <strong><i class="fas fa-clipboard-list mr-1"></i> Curriculum Vitae</strong>
                  
                                  <a href="/pelamar/cv/{{$bda->cv}}" target="_blank">
                                    <p style="color: green;">
                                      {{$bda->cv}}
                                    </p>
                                  </a>

                                  <hr>
                  
                                  <strong><i class="fas fa-clipboard-list mr-1"></i> Surat Lamaran</strong>
                  
                                  <a href="/pelamar/suratlamaran/{{$bda->surat_lamaran}}" target="_blank">
                                    <p style="color: green;">
                                      {{$bda->surat_lamaran}}
                                    </p>
                                  </a>

                                  <hr>
                  
                                  <strong><i class="fas fa-clipboard-list mr-1"></i> Ijazah</strong>
                  
                                  <a href="/pelamar/ijazah/{{$bda->ijazah}}" target="_blank">
                                    <p style="color: green;">
                                      {{$bda->ijazah}}
                                    </p>
                                  </a>

                                  <hr>
                  
                                  <strong><i class="fas fa-calendar-check mr-1"></i> Persetujuan</strong>
                  
                                  <p style="color: green;">
                                    {{$bda->persetujuan}}
                                  </p>
                                </div>
                                <!-- /div 2 -->
                            </div>
                            @switch($bda)
                                        @case($bda->status == 'Diterima')
                                            @break
                                        @case($bda->status == 'Ditolak')
                                            @break
                                        @default
                                            @if ($bda->status == 'waiting')
                                            <a href="/admin/{{$bda->id}}/diterima" class="btn btn-success px-4 float-right" onclick="return confirm('Apakah anda yakin?')">Diterima</a>
                                            <a href="/admin/{{$bda->id}}/ditolak" class="btn btn-danger px-4 float-left" onclick="return confirm('Apakah anda yakin?')">Ditolak</a>
                                            @else
                                            @endif
                            @endswitch
                              </div>
                            </div>
                          <!-- /.card-body -->
                    </div>
              </div>
              @endforeach
              </div>
        </div>
  </div>
</div>

@endsection