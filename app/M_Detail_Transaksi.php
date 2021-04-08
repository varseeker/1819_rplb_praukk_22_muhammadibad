<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_Detail_Transaksi extends Model
{
    protected $table = 't_detail_transaksi';
    protected $primaryKey = 'id';
    protected $keyType = 'integer';
    public $timestamps = false;
    protected $fillable = ['id', 'id_transaksi', 'id_paket', 'kuantitas', 'keterangan'];

    public function outlet()
    {
        return $this->belongsTo('App\M_Outlet', 'id_outlet', 'id');
    }
    public function transaksi()
    {
        return $this->belongsTo('App\M_Transaksi', 'id_transaksi', 'id');
    }
}
