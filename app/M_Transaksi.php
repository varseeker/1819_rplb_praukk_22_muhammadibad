<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_Transaksi extends Model
{
    protected $table = 't_transaksi';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = ['id', 'id_outlet', 'id_customer','id_paket', 'id_petugas', 'tgl_pesan', 'tgl_bayar', 'status', 'dibayar', 'total'];

    public function outlet()
    {
        return $this->belongsTo('App\M_Outlet', 'id_outlet', 'id');
    }
    public function detail()
    {
        return $this->hasMany('App\M_Detail_Transaksi');
    }
    public function customer()
    {
        return $this->belongsTo('App\M_Customer', 'id_customer', 'id');
    }
}
