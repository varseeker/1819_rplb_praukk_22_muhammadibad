<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_Outlet extends Model
{
    protected $table = 't_outlet';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $timestamps = false;
    protected $fillable = ['id','nama', 'alamat', 'tlp'];

    public function outlet()
    {
        return $this->belongsTo('App\M_Outlet', 'id', 'id_outlet');
    }
}
