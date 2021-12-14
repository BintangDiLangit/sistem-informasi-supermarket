<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProdukController extends Controller
{
	function index()
	{
		$data = Http::get('http://127.0.0.1:8002/api/produk')->json();
		$kategoris = Http::get('http://127.0.0.1:8002/api/kategori')->json();
		$pemasoks = Http::get('http://127.0.0.1:8001/api/pemasok')->json();
		return view('admin.produk.index', ['data' => $data['data']], compact('kategoris', 'pemasoks'));
	}

	function store(Request $request)
	{
		$client = new Client();
		$res = $client->request('POST', 'http://127.0.0.1:8002/api/produk', [
			'json' => [
				'nama_produk' => $request->nama_produk,
				'stok' => $request->stok,
				'tanggal_kadaluwarsa' => $request->tanggal_kadaluwarsa,
				'deskripsi_produk' => $request->deskripsi_produk,
				'harga_beli' => $request->harga_beli_per_produk,
				'harga_jual' => $request->harga_jual_per_produk,
				'id_kategori' => $request->id_kategori,
				'id_pemasok' => $request->id_pemasok,
			]
		]);
		return redirect(route('produk.index'));
	}
	public function update(Request $request, $id)
	{
		$client = new Client();
		$data = $client->request('PUT', 'http://127.0.0.1:8002/api/produk/' . $id, [
			'json' => [
				'nama_produk' => $request->nama_produk,
				'stok' => $request->stok,
				'tanggal_kadaluwarsa' => $request->tanggal_kadaluwarsa,
				'deskripsi_produk' => $request->deskripsi_produk,
				'harga_beli' => $request->harga_beli_per_produk,
				'harga_jual' => $request->harga_jual_per_produk,
				'id_kategori' => $request->id_kategori,
				'id_pemasok' => $request->id_pemasok,
			]
		]);
		return redirect(route('produk.index'));
	}
	public function destroy($id)
	{
		$client = new Client();
		$data = $client->request('DELETE', 'http://127.0.0.1:8002/api/produk/' . $id);
		return redirect(route('produk.index'));
	}
}
