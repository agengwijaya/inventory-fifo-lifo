<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function piutang_usaha()
    {
        $from_date_value = request()->from ?? date('Y-m-01');
        $to_date_value = request()->to ?? date('Y-m-d');
        return $this->hasMany(PiutangUsaha::class)->whereBetween('tanggal_transaksi', [$from_date_value, $to_date_value])->where('soft_delete', 0);
    }
}
