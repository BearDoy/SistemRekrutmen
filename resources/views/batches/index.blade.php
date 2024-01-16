@extends('layouts.master')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Batch</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active">Batch</li>
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
                        <!-- Tambahkan tombol tambah batch di sini -->
                        <button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#exampleModal" style="margin-bottom: 15px;">
                            <i class="fas fa-plus"></i> Tambah Batch
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div style="overflow-x: auto;">
                            <table id="DataTables" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Batch</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($batches as $batch)
                                    <tr>
                                        <td>{{$batch->id}}</td>
                                        <td>{{$batch->nama_batch}}</td>
                                        <td>{{$batch->tanggal}}</td>
                                        <td>{{$batch->status}}</td>
                                        <td>
                                            <!-- Tambahkan tombol aksi di sini: -->
                                            <button type="button" class="btn btn-warning btn-sm btn-edit"
                                                    data-id="{{$batch->id}}"
                                                    data-nama_batch="{{$batch->nama_batch}}"
                                                    data-tanggal="{{$batch->tanggal}}"
                                                    data-status="{{$batch->status}}">
                                                    Edit
                                            </button>

                                            <form action="{{ route('batches.destroy', $batch->id) }}" method="POST" style="display:inline;">
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

    <!-- Modal Tambah Batch -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Batch</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form tambah batch di sini -->
                    <form action="{{ route('batches.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama_batch">Nama Batch</label>
                            <input type="text" class="form-control" id="nama_batch" name="nama_batch" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="Open">Open</option>
                                <option value="Close">Close</option>
                            </select>
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

    <!-- Modal Edit Batch -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Batch</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form edit batch di sini -->
                    <form id="editForm" action="{{ route('batches.update', ['batch' => 0]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="edit_nama_batch">Nama Batch</label>
                            <input type="text" class="form-control" id="edit_nama_batch" name="nama_batch" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_tanggal">Tanggal</label>
                            <input type="date" class="form-control" id="edit_tanggal" name="tanggal" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_status">Status</label>
                            <select class="form-control" id="edit_status" name="status" required>
                                <option value="Open">Open</option>
                                <option value="Close">Close</option>
                            </select>
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
            // Fungsi untuk menampilkan data batch pada modal edit
            $('.btn-edit').on('click', function () {
                var id = $(this).data('id');
                var nama_batch = $(this).data('nama_batch');
                var tanggal = $(this).data('tanggal');
                var status = $(this).data('status');

                // Mengisi data pada modal edit
                var editForm = $('#editForm');
                var actionUrl = '{{ url("batches") }}/' + id;
                editForm.attr('action', actionUrl);
                editForm.find('#edit_nama_batch').val(nama_batch);
                editForm.find('#edit_tanggal').val(tanggal);
                editForm.find('#edit_status').val(status);

                // Menampilkan modal edit
                $('#editModal').modal('show');
            });

            // Menutup modal edit dan membersihkan formulir ketika modal ditutup
            $('#editModal').on('hidden.bs.modal', function () {
                var editForm = $('#editForm');
                editForm.attr('action', '{{ route("batches.update", ["batch" => 0]) }}');
                editForm.find('#edit_nama_batch').val('');
                editForm.find('#edit_tanggal').val('');
                editForm.find('#edit_status').val('');
            });
        });
    </script>


</section>

@endsection
