<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'suppliers';

    public function hutang_usaha()
    {
        $from_date_value = request()->from ?? date('Y-m-01');
        $to_date_value = request()->to ?? date('Y-m-d');
        return $this->hasMany(HutangUsaha::class)->whereBetween('tanggal_transaksi', [$from_date_value, $to_date_value])->where('soft_delete', 0);
    }
}
