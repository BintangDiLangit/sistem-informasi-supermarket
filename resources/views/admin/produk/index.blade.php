@extends('layouts.master')

@section('title')
    Produk
@endsection

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Produk</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                Tambah Produk
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah produk</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('produk.store') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="namaproduk">Pemasok Produk</label>
                                    <select class="form-control" name="id_pemasok" id="" required>
                                        <option value="">- Pilih Pemasok -</option>
                                        @foreach ($pemasoks['data'] as $pemasok)
                                            <option value="{{ $pemasok['id'] }}">
                                                {{ $pemasok['namapemasok'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="namaproduk">Kategori Produk</label>
                                    <select class="form-control" name="id_kategori" id="" required>
                                        <option value="">- Pilih Kategori -</option>
                                        @foreach ($kategoris['data'] as $kategori)
                                            <option value="{{ $kategori['id'] }}">
                                                {{ $kategori['nama_kategori'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="namaproduk">Nama Produk</label>
                                    <input type="text" name="nama_produk" class="form-control" id="namaproduk" required>
                                </div>
                                <div class="form-group">
                                    <label for="stok">Stok</label>
                                    <input type="number" name="stok" class="form-control" id="stok" required>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_kadaluwarsa">Tanggal Kadaluwarsa</label>
                                    <input type="date" name="tanggal_kadaluwarsa" class="form-control"
                                        id="tanggal_kadaluwarsa" required>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi_produk">Deskripsi Produk</label>
                                    <textarea name="deskripsi_produk" id="" cols="30" class="form-control" rows="10"
                                        required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="harga_beli_per_produk">Harga Beli Per Produk</label>
                                    <input type="number" name="harga_beli_per_produk" class="form-control"
                                        id="harga_beli_per_produk" required>
                                </div>
                                <div class="form-group">
                                    <label for="harga_jual_per_produk">Harga Jual Per Produk</label>
                                    <input type="number" name="harga_jual_per_produk" class="form-control"
                                        id="harga_jual_per_produk" required>
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
                            <th>Kategori Produk</th>
                            <th>Nama Produk</th>
                            <th>Stok</th>
                            <th>Tgl Kadaluwarsa</th>
                            <th>Harga Beli Per Produk</th>
                            <th>Harga Jual Per Produk</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Kategori Produk</th>
                            <th>Nama Produk</th>
                            <th>Stok</th>
                            <th>Tgl Kadaluwarsa</th>
                            <th>Harga Beli Per Produk</th>
                            <th>Harga Jual Per Produk</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($data as $d)
                            <tr>
                                <td>{{ $d['kategori']['nama_kategori'] }}</td>
                                <td>{{ $d['nama_produk'] }}</td>
                                <td>{{ $d['stok'] }}</td>
                                <td>{{ $d['tanggal_kadaluwarsa'] }}</td>
                                <td>{{ $d['harga_beli'] }}</td>
                                <td>{{ $d['harga_jual'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                        data-target="#exampleModal2{{ $d['id'] }}" id="updatebutton"
                                        value="{{ $d['id'] }}">
                                        Edit
                                    </button>

                                    <button type="" class="btn btn-danger hap delete" id="{!! $d['id'] !!}"
                                        onclick="hapusData({{ $d['id'] }})">Hapus</button>
                                    @if ($data != null)
                                        <div class="modal fade" id="exampleModal2{{ $d['id'] }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit produk</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('produk.update', ['produk' => $d['id']]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="namaproduk">Pemasok Produk</label>
                                                                <select class="form-control" name="id_pemasok" id=""
                                                                    required>
                                                                    <option value="">- Pilih Pemasok -</option>
                                                                    @foreach ($pemasoks['data'] as $pemasok)
                                                                        <option
                                                                            {{ $pemasok['id'] == $d['id_pemasok'] ? 'selected' : '' }}
                                                                            value="{{ $pemasok['id'] }}">
                                                                            {{ $pemasok['namapemasok'] }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="namaproduk">Kategori Produk</label>
                                                                <select class="form-control" name="id_kategori" id=""
                                                                    required>
                                                                    <option value="">- Pilih Kategori -</option>
                                                                    @foreach ($kategoris['data'] as $kategori)
                                                                        <option
                                                                            {{ $kategori['id'] == $d['id_kategori'] ? 'selected' : '' }}
                                                                            value="{{ $kategori['id'] }}">
                                                                            {{ $kategori['nama_kategori'] }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="namaproduk">Nama Produk</label>
                                                                <input type="text" name="nama_produk"
                                                                    value="{{ $d['nama_produk'] }}"
                                                                    class="form-control" id="namaproduk" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="stok">Stok</label>
                                                                <input type="number" name="stok"
                                                                    value="{{ $d['stok'] }}" class="form-control"
                                                                    id="stok" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="tanggal_kadaluwarsa">Tanggal Kadaluwarsa
                                                                    ({{ $d['tanggal_kadaluwarsa'] }})</label>
                                                                <input type="date" name="tanggal_kadaluwarsa"
                                                                    class="form-control" id="tanggal_kadaluwarsa"
                                                                    required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="deskripsi_produk">Deskripsi Produk</label>
                                                                <textarea name="deskripsi_produk" id="" cols="30"
                                                                    class="form-control" rows="10"
                                                                    required>{{ $d['deskripsi_produk'] }}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="harga_beli_per_produk">Harga Beli Per
                                                                    Produk</label>
                                                                <input type="number" value="{{ $d['harga_beli'] }}"
                                                                    name="harga_beli_per_produk" class="form-control"
                                                                    id="harga_beli_per_produk" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="harga_jual_per_produk">Harga Jual Per
                                                                    Produk</label>
                                                                <input type="number" value="{{ $d['harga_jual'] }}"
                                                                    name="harga_jual_per_produk" class="form-control"
                                                                    id="harga_jual_per_produk" required>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Update
                                                                Produk</button>
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
            <!-- Modal -->

        </div>
    </div>
    <script>
        function getid() {
            let id = 0;
            $(document).on('click', '.hap', function() {
                id += $(this).attr('id');
            })
            return id;
        }

        function hapusData(id) {
            var r = confirm("Apa anda yakin untuk menghapus produk ini?");
            if (r == true) {
                $(document).on('click', '.delete', function() {
                    $.ajax({
                        url: 'produk/' + id,
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
