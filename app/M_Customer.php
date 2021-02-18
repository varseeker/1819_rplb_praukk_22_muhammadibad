<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_Customer extends Model
{
    protected $table = 't_customer';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = ['id','nama', 'alamat', 'jenis_kelamin', 'tlp'];

    /* public function transaksi()
    {
        return $this->hasMany('App\M_Transaksi');
    } */
}
