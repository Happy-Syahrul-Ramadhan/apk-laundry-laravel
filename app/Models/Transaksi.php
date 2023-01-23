<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'tb_transaksi';
    public $timestamps = false;

    public function Member()
    {
    	return $this->belongsTo(Member::class, 'id_member');
    }

    public function DetailTransaksi()
    {
    	return $this->hasMany(DetailTransaksi::class, 'id_transaksi');
    }
}
