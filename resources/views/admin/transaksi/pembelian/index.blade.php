@extends('layouts.master')

@section('title')
    Pembelian
@endsection

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pembelian</h1>
    <a href="{{ route('pembelian.create') }}" class="btn btn-success mb-4">Tambah Pembelian</a>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Pembelian</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Penjual</th>
                            <th>Tanggal Transaksi (Terbeli)</th>
                            <th>Barang yang dipasok</th>
                            <th>Total Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama Penjual</th>
                            <th>Tanggal Transaksi (Terbeli)</th>
                            <th>Barang yang dipasok</th>
                            <th>Total Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($data as $d)
                            <tr>
                                <td>{{ $d['namapemasok'] }}</td>
                                <td>{{ $d['tanggalpembelian'] }}</td>
                                <td>
                                    @foreach ($d['produks'] as $barang)
                                        {{ $barang['nama_produk'] }},
                                    @endforeach
                                </td>
                                <td>{{ $d['totalHarga'] }}</td>
                                <td>
                                    <button type="button" class="btn btn-info" data-id="{{ $d['id'] }}"
                                        data-toggle="modal" data-target="#exampleModal2{{ $d['id'] }}"
                                        id="updatebutton">
                                        Detail
                                    </button>
                                    <button type="button" class="btn btn-danger hap delete" value="{{ $d['id'] }}"
                                        id="{!! $d['id'] !!}" onclick="hapusData({{ $d['id'] }})">Hapus</button>

                                    @if ($data != null)
                                        <div class="modal fade" id="exampleModal2{{ $d['id'] }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Detail Pembelian
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card" style="width: 18rem;">
                                                            <div class="card-body">
                                                                <h5 class="card-title">Pembeli :
                                                                    {{ $d['namapemasok'] }}</h5>
                                                                <h6 class="card-subtitle mb-2 text-muted">Tgl terbeli :
                                                                    {{ $d['tanggalpembelian'] }}</h6>
                                                                <ul>
                                                                    @foreach ($d['produks'] as $barang)
                                                                        <li>
                                                                            {{ $barang['nama_produk'] }} -
                                                                            {{ $barang['pivot']['banyakbarang'] }}
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                                <p class="card-text">
                                                                    Total Harga : {{ $d['totalHarga'] }}
                                                                </p>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
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
            var r = confirm("Apa anda yakin untuk menghapus pembelian ini?");
            if (r == true) {
                console.log(id);
                $(document).on('click', '.delete', function() {
                    $.ajax({
                        url: 'pembelian/' + id,
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
