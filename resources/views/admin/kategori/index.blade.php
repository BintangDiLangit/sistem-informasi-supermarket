@extends('layouts.master')

@section('title')
    Kategori
@endsection

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kategori</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                Tambah Kategori
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('kategori.store') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="namakategori">Nama Kategori</label>
                                    <input type="text" name="nama_kategori" class="form-control" id="namakategori"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi_kategori">Deskripsi Kategori</label>
                                    <textarea name="deskripsi_kategori" id="" cols="30" class="form-control" rows="10"
                                        required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Tambahkan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Kategori</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Kategori</th>
                            <th>Nama Kategori</th>
                            <th>Deskripsi Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama Kategori</th>
                            <th>Nama Kategori</th>
                            <th>Deskripsi Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($data as $d)
                            <tr>
                                <td>{{ $d['nama_kategori'] }}</td>
                                <td>{{ $d['id'] }}</td>
                                <td>{{ $d['deskripsi_kategori'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-info" data-id="{{ $d['id'] }}"
                                        data-toggle="modal" data-target="#exampleModal2{{ $d['id'] }}"
                                        id="updatebutton">
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger hap delete" value="{{ $d['id'] }}"
                                        id="{!! $d['id'] !!}" onclick="hapusData({{ $d['id'] }})">Hapus</button>
                                    @if ($data != null)
                                        <div class="modal fade" id="exampleModal2{{ $d['id'] }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form
                                                        action="{{ route('kategori.update', ['kategori' => $d['id']]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="namakategori">Nama Kategori</label>
                                                                <input type="text" name="nama_kategori"
                                                                    value="{{ $d['nama_kategori'] }}"
                                                                    class="form-control" id="namakategori" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="deskripsi_kategori">Deskripsi Kategori</label>
                                                                <textarea name="deskripsi_kategori" id="" cols="30"
                                                                    class="form-control" rows="10"
                                                                    required>{{ $d['deskripsi_kategori'] }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Update
                                                                Kategori</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    @endif
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <script>
        function hapusData(id) {
            var r = confirm("Apa anda yakin untuk menghapus kategori ini?");
            if (r == true) {
                console.log(id);
                $(document).on('click', '.delete', function() {
                    $.ajax({
                        url: 'kategori/' + id,
                        type: 'DELETE',
                        data: {
                            "_token": "{{ csrf_token() }}"
                        }
                    });

                    location.reload()
                })

            } else {

            }

        }
    </script>
@endsection
