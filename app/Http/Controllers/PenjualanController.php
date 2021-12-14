<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PenjualanController extends Controller
{
	function index()
	{
		$data = Http::get('http://127.0.0.1:8002/api/penjualan')->json();

		return view('admin.transaksi.penjualan.index', ['data' => $data['data']]);
	}

	function create()
	{
		$produks = Http::get('http://127.0.0.1:8002/api/produk')->json();
		// dd($produks['data']);
		return view('admin.transaksi.penjualan.create', ['produks' => $produks['data']]);
	}

	public function store(Request $request)
	{
		$client = new Client();
		// dd($request);
		$res = $client->request('POST', 'http://127.0.0.1:8002/api/penjualan', [
			'json' => [
				'namapembeli' => $request->namapembeli,
				'tanggalpenjualan' => $request->tanggalpenjualan,
				'produk' => $request->produk,
				'banyakbarang' => $request->banyakbarang
			]
		]);
		return redirect(route('penjualan.index'));
	}
	public function destroy($id)
	{
		$client = new Client();
		$data = $client->request('DELETE', 'http://127.0.0.1:8002/api/penjualan/' . $id);
		return redirect(route('penjualan.index'));
	}
}
