<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
	public function index()
	{
		try {
			$last_code = Customer::orderBy('id', 'desc')->limit(1)->get();
	
			if ($last_code->count()) {
				$replace = str_replace('CS00', '', $last_code[0]->kode);
				$increment = $replace + 1;
				$code = 'CS00' . $increment;
			} else {
				$code = 'CS001';
			}
	
			return view('master.customers.index', [
				'customers' => Customer::where('soft_delete', 0)->get(),
				'code' => $code
			]);
		} catch (\Throwable $th) {
				return back()->with('error', 'Maaf, ada kesalahan data. Silahkan coba kembali!');
		}
	}

	public function store(Request $request)
	{
		try {
			$data_insert = [
				'kode' => $request->kode,
				'nama' => $request->nama,
				'no_hp' => $request->no_hp,
				'alamat' => $request->alamat,
			];
	
			Customer::create($data_insert);
	
			return back();
		} catch (\Throwable $th) {
				return back()->with('error', 'Maaf, ada kesalahan data. Silahkan coba kembali!');
		}
	}

	public function update(Request $request, $id)
	{
		try {
			$data_update = [
				'nama' => $request->nama,
				'no_hp' => $request->no_hp,
				'alamat' => $request->alamat,
			];
	
			Customer::where('id', $id)->update($data_update);
	
			return back();
		} catch (\Throwable $th) {
				return back()->with('error', 'Maaf, ada kesalahan data. Silahkan coba kembali!');
		}
	}

	public function destroy($id)
	{
		try {
			Customer::where('id', $id)->update(['soft_delete' => 1, 'deleted_by' => auth()->user()->id]);
	
			return back();
		} catch (\Throwable $th) {
				return back()->with('error', 'Maaf, ada kesalahan data. Silahkan coba kembali!');
		}
	}
}
