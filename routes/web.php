<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Keluar\TransaksiKeluarFifoController;
use App\Http\Controllers\Keluar\TransaksiKeluarLifoController;
use App\Http\Controllers\Laporan\LaporanStokController;
use App\Http\Controllers\Master\BarangController;
use App\Http\Controllers\Master\CustomerController;
use App\Http\Controllers\Master\SupplierController;
use App\Http\Controllers\Master\UserController;
use App\Http\Controllers\Master\GudangController;
use App\Http\Controllers\Master\RolesController;
use App\Http\Controllers\Masuk\TransaksiBarangMasukController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::group(['middleware' => ['guest']], function () {
        Route::get('/', [LoginController::class, 'index'])->name('login');
        Route::post('/login', [LoginController::class, 'authenticate']);
    });

    Route::group(['middleware' => ['auth']], function () {
        Route::post('/logout', [LoginController::class, 'logout']);

        Route::group(['prefix' => 'dashboard'], function () {
            Route::get('/', [Dashboard::class, 'index'])->name('dashboard.index');
        });

        Route::group(['prefix' => 'barang-masuk'], function () {
            Route::get('/', [TransaksiBarangMasukController::class, 'index'])->name('barang-masuk.index');
            Route::get('/edit', [TransaksiBarangMasukController::class, 'edit']);
            Route::put('/{id}', [TransaksiBarangMasukController::class, 'update']);
            Route::delete('/hapus', [TransaksiBarangMasukController::class, 'hapus']);
            Route::get('/data', [TransaksiBarangMasukController::class, 'data']);
            Route::post('/simpan-detail', [TransaksiBarangMasukController::class, 'simpan_detail']);
            Route::post('/', [TransaksiBarangMasukController::class, 'simpan']);
            Route::get('/data-detail', [TransaksiBarangMasukController::class, 'data_detail']);
            Route::get('/table-detail', [TransaksiBarangMasukController::class, 'data_table_detail']);
            Route::post('/approve/{id}', [TransaksiBarangMasukController::class, 'approve']);
            Route::post('/draft/{id}', [TransaksiBarangMasukController::class, 'draft']);
            Route::post('/ajukan-ulang/{id}', [TransaksiBarangMasukController::class, 'ajukan_ulang']);
            Route::get('/preview-approval/{id}', [TransaksiBarangMasukController::class, 'preview_approval']);
        });

        Route::group(['prefix' => 'fifo'], function () {
            Route::get('/', [TransaksiKeluarFifoController::class, 'index'])->name('fifo.index');
            Route::get('/edit', [TransaksiKeluarFifoController::class, 'edit']);
            Route::put('/{id}', [TransaksiKeluarFifoController::class, 'update']);
            Route::delete('/hapus', [TransaksiKeluarFifoController::class, 'hapus']);
            Route::get('/data', [TransaksiKeluarFifoController::class, 'data']);
            Route::post('/simpan-detail', [TransaksiKeluarFifoController::class, 'simpan_detail']);
            Route::post('/', [TransaksiKeluarFifoController::class, 'simpan']);
            Route::get('/data-detail', [TransaksiKeluarFifoController::class, 'data_detail']);
            Route::get('/table-detail', [TransaksiKeluarFifoController::class, 'data_table_detail']);
            Route::post('/approve/{id}', [TransaksiKeluarFifoController::class, 'approve']);
            Route::post('/draft/{id}', [TransaksiKeluarFifoController::class, 'draft']);
            Route::post('/ajukan-ulang/{id}', [TransaksiKeluarFifoController::class, 'ajukan_ulang']);
            Route::get('/preview-approval/{id}', [TransaksiKeluarFifoController::class, 'preview_approval']);
            Route::get('/get-barang', [TransaksiKeluarFifoController::class, 'get_barang']);
        });

        Route::group(['prefix' => 'lifo'], function () {
            Route::get('/', [TransaksiKeluarLifoController::class, 'index'])->name('lifo.index');
            Route::get('/edit', [TransaksiKeluarLifoController::class, 'edit']);
            Route::put('/{id}', [TransaksiKeluarLifoController::class, 'update']);
            Route::delete('/hapus', [TransaksiKeluarLifoController::class, 'hapus']);
            Route::get('/data', [TransaksiKeluarLifoController::class, 'data']);
            Route::post('/simpan-detail', [TransaksiKeluarLifoController::class, 'simpan_detail']);
            Route::post('/', [TransaksiKeluarLifoController::class, 'simpan']);
            Route::get('/data-detail', [TransaksiKeluarLifoController::class, 'data_detail']);
            Route::get('/table-detail', [TransaksiKeluarLifoController::class, 'data_table_detail']);
            Route::post('/approve/{id}', [TransaksiKeluarLifoController::class, 'approve']);
            Route::post('/draft/{id}', [TransaksiKeluarLifoController::class, 'draft']);
            Route::post('/ajukan-ulang/{id}', [TransaksiKeluarLifoController::class, 'ajukan_ulang']);
            Route::get('/preview-approval/{id}', [TransaksiKeluarLifoController::class, 'preview_approval']);
            Route::get('/get-barang', [TransaksiKeluarLifoController::class, 'get_barang']);
        });

        Route::group(['prefix' => 'laporan'], function () {
            Route::get('/', [LaporanStokController::class, 'index'])->name('laporan.index');
            Route::get('list', [LaporanStokController::class, 'list']);
        });

        // Module Master
        Route::group(['prefix' => 'data-master-user'], function () {
            Route::get('data-user', [UserController::class, 'index'])->name('data-master.data-user.index');
            Route::get('data-user/data', [UserController::class, 'data']);
            Route::post('data-user', [UserController::class, 'store']);
            Route::get('data-user/{user}', [UserController::class, 'edit'])->name('data-user.edit');
            Route::put('data-user/{user}', [UserController::class, 'update']);
            Route::put('data-user/update-akses-mobile/{id}', [UserController::class, 'update_akses_mobile']);
            Route::put('data-user/update-akses-wilayah/{id}', [UserController::class, 'update_akses_wilayah']);
            Route::delete('data-user/{id}', [UserController::class, 'destroy'])->name('data-user.hapus');

            Route::get('profil/{user}', [UserController::class, 'profil'])->name('profil.edit');
            Route::put('profil/{user}', [UserController::class, 'update_profil']);

            // Route::get('data-master-user/data-user-role', [UserRoleController::class, 'index']);
            // Route::post('data-master-user/data-user-role', [UserRoleController::class, 'store']);
        });

        Route::group(['prefix' => 'data-master'], function () {
            Route::get('data-suppliers', [SupplierController::class, 'index'])->name('data-master.data-suppliers.index');
            Route::post('data-suppliers', [SupplierController::class, 'store']);
            Route::put('data-suppliers/{id}', [SupplierController::class, 'update']);
            Route::delete('data-suppliers/{id}', [SupplierController::class, 'destroy']);

            Route::get('data-customers', [CustomerController::class, 'index'])->name('data-master.customers.index');
            Route::post('data-customers', [CustomerController::class, 'store']);
            Route::put('data-customers/{id}', [CustomerController::class, 'update']);
            Route::delete('data-customers/{id}', [CustomerController::class, 'destroy']);

            Route::group(['prefix' => 'data-gudang'], function () {
                Route::get('/', [GudangController::class, 'index'])->name('data-master.data-gudang.index');
                Route::post('/', [GudangController::class, 'store']);
                Route::put('/{id}', [GudangController::class, 'update']);
                Route::post('/{id}', [GudangController::class, 'destroy']);
            });

            Route::group(['prefix' => 'data-barang'], function () {
                Route::get('/', [BarangController::class, 'index'])->name('data-master.barang.index');
                Route::post('/', [BarangController::class, 'store']);
                Route::put('/{id}', [BarangController::class, 'update']);
                Route::delete('/{id}', [BarangController::class, 'destroy']);
                Route::post('/store-jenis-barang', [BarangController::class, 'store_jenis_barang']);
                Route::put('/update-jenis-barang/{id}', [BarangController::class, 'update_jenis_barang']);
                Route::delete('/destroy-jenis-barang/{id}', [BarangController::class, 'destroy_jenis_barang']);
                Route::post('/store-satuan-barang', [BarangController::class, 'store_satuan_barang']);
                Route::put('/update-satuan-barang/{id}', [BarangController::class, 'update_satuan_barang']);
                Route::delete('/destroy-satuan-barang/{id}', [BarangController::class, 'destroy_satuan_barang']);
            });
        });
    });

    Route::group(['prefix' => 'roles'], function () {
        Route::post('/tambah/{id}', [RolesController::class, 'tambah_route']);
        Route::delete('/hapus/{id}', [RolesController::class, 'hapus_route']);
    });
    Route::resource('roles', Master\RolesController::class);
    Route::resource('permissions', Master\PermissionsController::class);
});
