<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_Petugas extends Model
{
    protected $table = 't_petugas';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = ['id','nama', 'alamat', 'jenis_kelamin', 'email', 'tlp'];

    /* public function transaksi()
    {
        return $this->hasMany('App\M_Transaksi');
    } */
}
