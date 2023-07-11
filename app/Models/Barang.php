<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $guarded = ['id'];

    protected $with = ['jenis_barang', 'supplier', 't_satuan_barang'];

    public function jenis_barang()
    {
        return $this->belongsTo(JenisBarang::class, 'barang_jenis_id', 'id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function t_satuan_barang()
    {
        return $this->belongsTo(SatuanBarang::class, 'barang_satuan_id', 'id');
    }

    public function stoks()
    {
        $from = request()->from ?? date('Y-m-01');
        $to = request()->to ?? date('Y-m-d');
        return $this->hasMany(Stok::class)->whereBetween('tanggal_transaksi', [$from, $to])->where('soft_delete', 0);
    }
}
