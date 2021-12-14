<?php

namespace App\Http\Controllers;

use App\Models\Pemasok;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PemasokController extends Controller
{

	function index()
	{
		$client = new Client();
		$data = $client->request(
			'GET',
			'http://127.0.0.1:8001/api/pemasok',
		)->getBody()->getContents();

		$fixData = json_decode($data, true);
		return view('admin.pemasok.index', ['data' => $fixData['data']]);
	}

	function store(Request $request)
	{
		$client = new Client();;
		$res = $client->request('POST', 'http://127.0.0.1:8001/api/pemasok', [
			'json' => [
				'namapemasok' => $request->namapemasok,
				'alamat' => $request->alamat,
				'notelp' => $request->notelp
			]
		]);
		return redirect(route('pemasok.index'));
	}

	public function update(Request $request, $id)
	{
		$client = new Client();
		// dd($request);
		$data = $client->request('PUT', 'http://127.0.0.1:8001/api/pemasok/' . $id, [
			'json' => [
				'namapemasok' => $request->namapemasok,
				'alamat' => $request->alamat,
				'notelp' => $request->notelp,
			]
		]);
		return redirect(route('pemasok.index'));
	}
	public function destroy($id)
	{
		$client = new Client();
		$data = $client->request('DELETE', 'http://127.0.0.1:8001/api/pemasok/' . $id);
		return redirect(route('pemasok.index'));
	}
}
