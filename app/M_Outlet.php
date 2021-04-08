<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_Outlet extends Model
{
    protected $table = 't_outlet';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = ['id', 'nama', 'alamat', 'tlp'];

    public function paket()
    {
        return $this->hasMany('App\M_Paket');
    }
    public function detail()
    {
        return $this->hasMany('App\M_Detail_Transaksi');
    }
}
