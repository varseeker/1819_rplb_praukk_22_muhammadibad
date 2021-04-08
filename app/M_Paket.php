<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_Paket extends Model
{
    protected $table = 't_paket';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = ['id','id_outlet', 'jenis', 'nama_paket', 'harga'];

    public function outlet()
    {
        return $this->belongsTo('App\M_Outlet', 'id_outlet', 'id');
    }
}
