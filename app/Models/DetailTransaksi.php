<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;

    protected $table = 'tb_detail_transaksi';
    public $timestamps = false;

    public function Paket()
    {
    	return $this->belongsTo(Paket::class, 'id_paket');
    }
}
