<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PembelianController extends Controller
{
	function index()
	{
		$data = Http::get('http://127.0.0.1:8002/api/pembelian')->json();

		return view('admin.transaksi.pembelian.index', ['data' => $data['data']]);
	}

	function create()
	{
		$produks = Http::get('http://127.0.0.1:8002/api/produk')->json();
		$pemasoks = Http::get('http://127.0.0.1:8001/api/pemasok')->json();
		return view('admin.transaksi.pembelian.create', ['produks' => $produks['data'], 'pemasoks' => $pemasoks['data']]);
	}

	public function store(Request $request)
	{
		$client = new Client();
		// dd($request);
		$res = $client->request('POST', 'http://127.0.0.1:8002/api/pembelian', [
			'json' => [
				'namapemasok' => $request->namapemasok,
				'tanggalpembelian' => $request->tanggalpembelian,
				'produk' => $request->produk,
				'banyakbarang' => $request->banyakbarang
			]
		]);
		return redirect(route('pembelian.index'));
	}
	public function destroy($id)
	{
		$client = new Client();
		$data = $client->request('DELETE', 'http://127.0.0.1:8002/api/pembelian/' . $id);
		return redirect(route('pembelian.index'));
	}
}
