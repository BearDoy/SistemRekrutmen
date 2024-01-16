@extends('layouts.master')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Lowongan Kerja</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active">Lowongan Kerja</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <!-- Tambahkan tombol tambah lowongan di sini -->
                        <button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#exampleModal" style="margin-bottom: 15px;">
                            <i class="fas fa-plus"></i> Tambah Lowongan
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div style="overflow-x: auto;">
                            <table id="DataTables" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Posisi</th>
                                        <th>Departemen</th>
                                        <th>Batch</th>
                                        <th>Persyaratan</th>
                                        <th>Tugas & Tanggung Jawab</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($lowongan_kerja as $lowongan)
                                    <tr>
                                        <td>{{$lowongan->id}}</td>
                                        <td>{{$lowongan->posisi}}</td>
                                        <td>{{@$lowongan->departemen->nama_departemen}}</td>
                                        <td>{{@$lowongan->batch->nama_batch}}</td>
                                        <td>{{$lowongan->persyaratan}}</td>
                                        <td>{{$lowongan->tugas}}</td>
                                        <td>
                                            <!-- Tambahkan tombol aksi di sini: -->
                                            <button type="button" class="btn btn-warning btn-sm btn-edit"
                                                    data-id="{{$lowongan->id}}"
                                                    data-posisi="{{$lowongan->posisi}}"
                                                    data-nama_departemen="{{$lowongan->departemen->nama_departemen}}"
                                                    data-persyaratan="{{$lowongan->persyaratan}}"
                                                    data-tugas="{{$lowongan->tugas}}">
                                                    Edit
                                            </button>

                                            <form action="{{ route('lowongan_kerja.destroy', $lowongan->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- Modal Tambah Lowongan -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Lowongan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form tambah lowongan di sini -->
                    <form action="{{ route('lowongan_kerja-store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="batch_id">Batch</label>
                            <select class="form-control" id="batch_id" name="batch_id" required>
                                <option selected disabled>Pilih Batch</option>
                                @foreach($batch as $item)
                                    <option value="{{$item->id}}">{{$item->nama_batch}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="posisi">Posisi</label>
                            <input type="text" class="form-control" id="posisi" name="posisi" required>
                        </div>
                        <div class="form-group">
                            <label for="departemen_id">Departemen</label>
                            <select class="form-control" id="departemen_id" name="departemen_id" required>
                                <option selected disabled>Pilih Departmen</option>
                                @foreach($departemens as $departemen)
                                    <option value="{{$departemen->id}}">{{$departemen->nama_departemen}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="persyaratan">Persyaratan</label>
                            <textarea class="form-control" id="persyaratan" name="persyaratan" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="tugas">Tugas dan Tanggung Jawab</label>
                            <textarea class="form-control" id="tugas" name="tugas" required></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Lowongan -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Lowongan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form edit lowongan di sini -->
                    <form id="editForm" action="{{ route('lowongan_kerja.update', ['lowongan_kerja' => 0]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="batch_id">Batch</label>
                            <select class="form-control" id="batch_id" name="batch_id" required>
                                <option selected disabled>Pilih Batch</option>
                                @foreach($batch as $item)
                                    <option value="{{$item->id}}">
                                        {{$item->nama_batch}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_posisi">Posisi</label>
                            <input type="text" class="form-control" id="edit_posisi" name="posisi" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_nama_departemen">Departemen</label>
                            <select class="form-control" id="edit_nama_departemen" name="departemen_id" required>
                                <option selected disabled>Pilih Departemen</option>
                                @foreach($departemens as $departemen)
                                    <option value="{{$departemen->id}}">
                                        {{$departemen->nama_departemen}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_persyaratan">Persyaratan</label>
                            <textarea class="form-control" id="edit_persyaratan" name="persyaratan" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="edit_tugas">Tugas dan Tanggung Jawab</label>
                            <textarea class="form-control" id="edit_tugas" name="tugas" required></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            // Fungsi untuk menampilkan data lowongan pada modal edit
            $('.btn-edit').on('click', function () {
                var id = $(this).data('id');
                var posisi = $(this).data('posisi');
                var departemen = $(this).data('nama_departemen');
                var persyaratan = $(this).data('persyaratan');
                var tugas = $(this).data('tugas');


                // Mengisi data pada modal edit
                var editForm = $('#editForm');
                var actionUrl = '{{ url("lowongan_kerja") }}/' + id;
                editForm.attr('action', actionUrl);
                editForm.find('#edit_posisi').val(posisi);
                editForm.find('#edit_nama_departemen').val(departemen);
                editForm.find('#edit_persyaratan').val(persyaratan);
                editForm.find('#edit_tugas').val(tugas);

                // Menampilkan modal edit
                $('#editModal').modal('show');
            });

            // Menutup modal edit dan membersihkan formulir ketika modal ditutup
            $('#editModal').on('hidden.bs.modal', function () {
                var editForm = $('#editForm');
                editForm.attr('action', '{{ route("lowongan_kerja.update", ["lowongan_kerja" => 0]) }}');
                editForm.find('#edit_posisi').val('');
                editForm.find('#edit_nama_departemen').val('');
                editForm.find('#edit_persyaratan').val('');
                editForm.find('#edit_tugas').val('');
            });
        });

            function redirectToPrevious() {
            window.history.back();
            }
    </script>

</section>

@endsection
