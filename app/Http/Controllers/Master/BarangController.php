<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\JenisBarang;
use App\Models\SatuanBarang;
use App\Models\Supplier;
use Illuminate\Http\Request;

class BarangController extends Controller
{
  public function index()
  {
    try {
      $last_code_jenis_barang = JenisBarang::count();
      $code_jenis_barang = "JB" . sprintf("%03d", $last_code_jenis_barang + 1);
      $last_code_barang = Barang::count();
      $code_barang = "BR" . sprintf("%03d", $last_code_barang + 1);
  
      return view('master.barang.index', [
        'suppliers' => Supplier::all(),
        'code_jenis_barang' => $code_jenis_barang,
        'code_barang' => $code_barang,
        'barang' => Barang::where('soft_delete', 0)->get(),
        'jenis_barang' => JenisBarang::where('soft_delete', 0)->get(),
        'satuan_barang' => SatuanBarang::where('soft_delete', 0)->get(),
        'title' => 'Data Barang'
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
        'barang_jenis_id' => $request->jenis_barang_id,
        'barang_satuan_id' => $request->satuan_barang,
        'nama' => $request->nama,
      ];
  
      Barang::create($data_insert);
  
      return back();
    } catch (\Throwable $th) {
        return back()->with('error', 'Maaf, ada kesalahan data. Silahkan coba kembali!');
    }
  }

  public function update(Request $request, $id)
  {
    try {
      $data_update = [
        'barang_jenis_id' => $request->jenis_barang_id,
        'barang_satuan_id' => $request->satuan_barang,
        'nama' => $request->nama,
      ];
  
      Barang::where('id', $id)->update($data_update);
  
      return back();
    } catch (\Throwable $th) {
        return back()->with('error', 'Maaf, ada kesalahan data. Silahkan coba kembali!');
    }
  }

  public function store_jenis_barang(Request $request)
  {
    try {
      $data_insert = [
        'kode' => $request->kode,
        'nama' => $request->nama,
      ];
  
      JenisBarang::create($data_insert);
  
      return back();
    } catch (\Throwable $th) {
        return back()->with('error', 'Maaf, ada kesalahan data. Silahkan coba kembali!');
    }
  }

  public function update_jenis_barang(Request $request, $id)
  {
    try {
      $data_update = [
        'nama' => $request->nama,
      ];
  
      JenisBarang::where('id', $id)->update($data_update);
  
      return back();
    } catch (\Throwable $th) {
        return back()->with('error', 'Maaf, ada kesalahan data. Silahkan coba kembali!');
    }
  }

  public function store_satuan_barang(Request $request)
  {
    try {
      $data_insert = [
        'kode_nama' => $request->kode_nama,
        'nama' => $request->nama,
      ];
  
      SatuanBarang::create($data_insert);
  
      return back();
    } catch (\Throwable $th) {
        return back()->with('error', 'Maaf, ada kesalahan data. Silahkan coba kembali!');
    }
  }

  public function update_satuan_barang(Request $request, $id)
  {
    try {
      $data_update = [
        'kode_nama' => $request->kode_nama,
        'nama' => $request->nama,
      ];
  
      SatuanBarang::where('id', $id)->update($data_update);
  
      return back();
    } catch (\Throwable $th) {
        return back()->with('error', 'Maaf, ada kesalahan data. Silahkan coba kembali!');
    }
  }

  public function destroy($id)
  {
    try {
      Barang::where('id', $id)->update(['soft_delete' => 1, 'deleted_by' => auth()->user()->id]);
  
      return back();
    } catch (\Throwable $th) {
        return back()->with('error', 'Maaf, ada kesalahan data. Silahkan coba kembali!');
    }
  }

  public function destroy_jenis_barang($id)
  {
    try {
      JenisBarang::where('id', $id)->update(['soft_delete' => 1, 'deleted_by' => auth()->user()->id]);
  
      return back();
    } catch (\Throwable $th) {
        return back()->with('error', 'Maaf, ada kesalahan data. Silahkan coba kembali!');
    }
  }

  public function destroy_satuan_barang($id)
  {
    try {
      SatuanBarang::where('id', $id)->update(['soft_delete' => 1, 'deleted_by' => auth()->user()->id]);
  
      return back();
    } catch (\Throwable $th) {
        return back()->with('error', 'Maaf, ada kesalahan data. Silahkan coba kembali!');
    }
  }
}
