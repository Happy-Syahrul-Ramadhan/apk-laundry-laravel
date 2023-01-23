<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;

    protected $table = 'tb_outlet';
    public $timestamps = false;

    public function Paket()
    {
    	return $this->hasMany(Paket::class, 'id_outlet');
    }

    public function User()
    {
    	return $this->hasMany(User::class, 'id_outlet');
    }

    public function Transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_outlet');
    }
}
