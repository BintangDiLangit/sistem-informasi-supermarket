@extends('layouts.master')

@section('title')
    Pemasok
@endsection

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pemasok</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                Tambah pemasok
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah pemasok</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('pemasok.store') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="namapemasok">Nama pemasok</label>
                                    <input type="text" name="namapemasok" class="form-control" id="namapemasok" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" name="alamat" class="form-control" id="alamat" required>
                                </div>
                                <div class="form-group">
                                    <label for="notelp">Nomor Telp</label>
                                    <input type="text" name="notelp" class="form-control" id="notelp" required>
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
            <h6 class="m-0 font-weight-bold text-primary">List Produk</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Pemasok</th>
                            <th>Alamat Pemasok</th>
                            <th>Nomor Telp.</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama Pemasok</th>
                            <th>Alamat Pemasok</th>
                            <th>Nomor Telp.</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($data as $d)
                            <tr>
                                <td>{{ $d['namapemasok'] }}</td>
                                <td>{{ $d['alamat'] }}</td>
                                <td>{{ $d['notelp'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                        data-target="#exampleModal2{{ $d['id'] }}" id="updatebutton"
                                        value="{{ $d['id'] }}">
                                        Edit
                                    </button>
                                    <button type="button" class="btn btn-danger hap delete" id="{!! $d['id'] !!}"
                                        onclick="hapusData({{ $d['id'] }})">Hapus</button>
                                    <!-- Modal -->
                                    @if ($data != null)
                                        <div class="modal fade" id="exampleModal2{{ $d['id'] }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit pemasok</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('pemasok.update', ['pemasok' => $d['id']]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="namapemasok">Nama pemasok</label>
                                                                <input type="text" value="{{ $d['namapemasok'] }}"
                                                                    name="namapemasok" class="form-control"
                                                                    id="namapemasok" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="alamat">Alamat</label>
                                                                <input type="text" value="{{ $d['alamat'] }}"
                                                                    name="alamat" class="form-control" id="alamat"
                                                                    required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="notelp">Nomor Telp</label>
                                                                <input type="text" value="{{ $d['notelp'] }}"
                                                                    name="notelp" class="form-control" id="notelp"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Update
                                                                Pemasok</button>
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
            var r = confirm("Apa anda yakin untuk menghapus pemasok ini?");
            if (r == true) {
                console.log(id);
                $(document).on('click', '.delete', function() {
                    $.ajax({
                        url: 'pemasok/' + id,
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
