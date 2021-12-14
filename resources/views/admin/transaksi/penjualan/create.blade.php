@extends('layouts.master')

@section('title')
    Penjualan
@endsection

@section('content')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Penjualan</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Penjualan</h6>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('penjualan.store') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-12 mb-3">
                        <div class="row align-items-center">
                            <div class="col-lg-4 ">
                                <Label>Nama Pembeli : </Label>
                                <input type="text" name="namapembeli" class="form-control m-input">
                            </div>
                            <div class="col-lg-4 ">
                                <Label>Tanggal Transaksi : </Label>
                                <input type="date" name="tanggalpenjualan" class="form-control m-input">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div id="inputFormRow">
                            <div class="input-group mb-3">
                                <div class="col">
                                    <select name="produk[]" class="form-control m-input">
                                        @foreach ($produks as $produk)
                                            <option value="{{ $produk['id'] }}">{{ $produk['nama_produk'] }} - (Rp.
                                                {{ $produk['harga_jual'] }} | Stok : {{ $produk['stok'] }})</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <input type="text" name="banyakbarang[]" class="form-control m-input"
                                        placeholder="Banyak barang" autocomplete="off">
                                </div>

                                <div class="input-group-append">
                                    <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                                </div>
                            </div>
                        </div>

                        <div id="newRow"></div>
                        <button id="addRow" type="button" class="btn btn-info">Add Row</button>
                        <button id="" type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        // add row
        $("#addRow").click(function() {
            var html = `<div id="inputFormRow">
                            <div class="input-group mb-3">
                                <div class="col">
                                    <select name="produk[]" class="form-control m-input">
                                        @foreach ($produks as $produk)
                                            <option value="{{ $produk['id'] }}">{{ $produk['nama_produk'] }} - (Rp.
                                                {{ $produk['harga_jual'] }} | Stok : {{ $produk['stok'] }})</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <input type="text" name="banyakbarang[]" class="form-control m-input"
                                        placeholder="Banyak barang" autocomplete="off">
                                </div>

                                <div class="input-group-append">
                                    <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                                </div>
                            </div>
                        </div>`;

            $('#newRow').append(html);
        });

        // remove row
        $(document).on('click', '#removeRow', function() {
            $(this).closest('#inputFormRow').remove();
        });
    </script>
    <script>
        const produks = {!! json_encode($produks) !!};

        function selectBarang(this, id) {
            var filtered = findStokByProduk(id);
            for (let index = 0; index < produks.length; index++) {
                var hargajual = filtered[0]['harga_jual'];
                var stok = filtered[0]['stok'];
                console.log(this.getAttribute('id'));
                document.getElementById("harga[1]").value = hargajual;
                document.getElementById("stok[]").value = stok;
            }

        }

        function findStokByProduk(id) {

            var filtered_stok = produks.filter(function(el) {
                return el.id == id;
            })

            return filtered_stok;
        }
    </script>
@endsection
