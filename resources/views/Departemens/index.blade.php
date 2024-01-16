@extends('layouts.master')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Departemen</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item active">Departemen</li>
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
                        <!-- Tambahkan tombol tambah departemen di sini -->
                        <button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#exampleModal" style="margin-bottom: 15px;">
                            <i class="fas fa-plus"></i> Tambah Departemen
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div style="overflow-x: auto;">
                            <table id="DataTables" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Departemen</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($departemen as $departement)
                                    <tr>
                                        <td>{{$departement->id}}</td>
                                        <td>{{$departement->nama_departemen}}</td>
                                        <td>
                                            <!-- Tambahkan tombol aksi di sini: -->
                                            <button type="button" class="btn btn-warning btn-sm btn-edit"
                                                    data-id="{{$departement->id}}"
                                                    data-nama_departemen="{{$departement->nama_departemen}}">
                                                    Edit
                                            </button>

                                            <form action="{{ route('departemens.destroy', $departement->id) }}" method="POST" style="display:inline;">
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

    <!-- Modal Tambah Departemen -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Departemen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form tambah departemen di sini -->
                    <form action="{{ route('departemens.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama_departemen">Nama Departemen</label>
                            <input type="text" class="form-control" id="nama_departemen" name="nama_departemen" required>
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

    <!-- Modal Edit Departemen -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Departemen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form edit departemen di sini -->
                    <form id="editForm" action="{{ route('departemens.update', ['departemen' => 0]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="edit_nama_departemen">Nama Departemen</label>
                            <input type="text" class="form-control" id="edit_nama_departemen" name="nama_departemen" required>
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
            // Fungsi untuk menampilkan data departemen pada modal edit
            $('.btn-edit').on('click', function () {
                var id = $(this).data('id');
                var nama_departemen = $(this).data('nama_departemen');

                // Mengisi data pada modal edit
                var editForm = $('#editForm');
                var actionUrl = '{{ url("departemens") }}/' + id;
                editForm.attr('action', actionUrl);
                editForm.find('#edit_nama_departemen').val(nama_departemen);


                // Menampilkan modal edit
                $('#editModal').modal('show');
            });

            // Menutup modal edit dan membersihkan formulir ketika modal ditutup
            $('#editModal').on('hidden.bs.modal', function () {
                var editForm = $('#editForm');
                editForm.attr('action', '{{ route("departemens.update", ["departemen" => 0]) }}');
                editForm.find('#edit_nama_departemen').val('');

            });
        });
    </script>


</section>

@endsection
