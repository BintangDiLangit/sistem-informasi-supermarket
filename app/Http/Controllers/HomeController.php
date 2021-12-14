<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
	function dashboard()
	{

		// Data Penjualan
		$dataPenjualan = Http::get('http://127.0.0.1:8002/api/penjualan')->json();

		$sumHasilPenjualan = 0;
		$sumBerapaPembeli = count($dataPenjualan['data']);

		for ($i = 0; $i < count($dataPenjualan['data']); $i++) {
			$sumHasilPenjualan += $dataPenjualan['data'][$i]['totalHarga'];
		}

		// Data Pembelian
		$datapembelian = Http::get('http://127.0.0.1:8002/api/pembelian')->json();

		$sumHasilPembelian = 0;


		for ($i = 0; $i < count($datapembelian['data']); $i++) {
			$sumHasilPembelian += $datapembelian['data'][$i]['totalHarga'];
		}

		$profit = $sumHasilPenjualan - $sumHasilPembelian;

		$januari = 0;
		$februari = 0;
		$maret = 0;
		$april = 0;
		$mei = 0;
		$juni = 0;
		$juli = 0;
		$agustus = 0;
		$september = 0;
		$oktober = 0;
		$november = 0;
		$desember = 0;
		for ($i = 0; $i < count($dataPenjualan['data']); $i++) {

			if (str_contains($dataPenjualan['data'][$i]['tanggalpenjualan'], '-01-')) {
				$januari += $dataPenjualan['data'][$i]['totalHarga'];
			};
			if (str_contains($dataPenjualan['data'][$i]['tanggalpenjualan'], '-02-')) {
				$februari += $dataPenjualan['data'][$i]['totalHarga'];
			};
			if (str_contains($dataPenjualan['data'][$i]['tanggalpenjualan'], '-03-')) {
				$maret += $dataPenjualan['data'][$i]['totalHarga'];
			};
			if (str_contains($dataPenjualan['data'][$i]['tanggalpenjualan'], '-04-')) {
				$april += $dataPenjualan['data'][$i]['totalHarga'];
			};
			if (str_contains($dataPenjualan['data'][$i]['tanggalpenjualan'], '-05-')) {
				$mei += $dataPenjualan['data'][$i]['totalHarga'];
			};
			if (str_contains($dataPenjualan['data'][$i]['tanggalpenjualan'], '-06-')) {
				$juni += $dataPenjualan['data'][$i]['totalHarga'];
			};
			if (str_contains($dataPenjualan['data'][$i]['tanggalpenjualan'], '-07-')) {
				$juli += $dataPenjualan['data'][$i]['totalHarga'];
			};
			if (str_contains($dataPenjualan['data'][$i]['tanggalpenjualan'], '-08-')) {
				$agustus += $dataPenjualan['data'][$i]['totalHarga'];
			};
			if (str_contains($dataPenjualan['data'][$i]['tanggalpenjualan'], '-09-')) {
				$september += $dataPenjualan['data'][$i]['totalHarga'];
			};
			if (str_contains($dataPenjualan['data'][$i]['tanggalpenjualan'], '-10-')) {
				$oktober += $dataPenjualan['data'][$i]['totalHarga'];
			};
			if (str_contains($dataPenjualan['data'][$i]['tanggalpenjualan'], '-11-')) {
				$november += $dataPenjualan['data'][$i]['totalHarga'];
			};
			if (str_contains($dataPenjualan['data'][$i]['tanggalpenjualan'], '-12-')) {
				$desember += $dataPenjualan['data'][$i]['totalHarga'];
			};
		}
		// dd($januari);

		$kategoris = Http::get('http://127.0.0.1:8002/api/kategori')->json();
		$banyakkategori = count($kategoris['data']);

		$produks = Http::get('http://127.0.0.1:8002/api/produk')->json();
		$banyakproduk = count($produks['data']);

		$pemasoks = Http::get('http://127.0.0.1:8001/api/pemasok')->json();
		$banyakpemasok = count($pemasoks['data']);

		return view('admin.dashboard', compact(
			'sumHasilPenjualan',
			'sumHasilPembelian',
			'sumBerapaPembeli',
			'profit',
			'januari',
			'februari',
			'maret',
			'april',
			'mei',
			'juni',
			'juli',
			'agustus',
			'september',
			'oktober',
			'november',
			'desember',
			'banyakkategori',
			'banyakproduk',
			'banyakpemasok'
		));
	}
}
