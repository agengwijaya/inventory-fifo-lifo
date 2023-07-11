<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\JenisBarang;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
	public function index()
	{
    try {
      $last_code = Supplier::orderBy('id', 'desc')->limit(1)->get();
  
      if ($last_code->count()) {
        $replace = str_replace('SP00', '', $last_code[0]->kode);
        $increment = $replace + 1;
        $code = 'SP00' . $increment;
      } else {
        $code = 'SP' . '001';
      }
  
      return view('master.suppliers.index', [
        'suppliers' => Supplier::where('soft_delete', 0)->get(),
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
        'no_rek' => $request->no_rek,
      ];
  
      Supplier::create($data_insert);
  
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
        'no_rek' => $request->no_rek,
      ];
  
      Supplier::where('id', $id)->update($data_update);
  
      return back();
    } catch (\Throwable $th) {
        return back()->with('error', 'Maaf, ada kesalahan data. Silahkan coba kembali!');
    }
	}

  public function destroy($id) {
    try {
      Supplier::where('id', $id)->update(['soft_delete' => 1, 'deleted_by' => auth()->user()->id]);
  
      return back();
    } catch (\Throwable $th) {
        return back()->with('error', 'Maaf, ada kesalahan data. Silahkan coba kembali!');
    }
  }
}
