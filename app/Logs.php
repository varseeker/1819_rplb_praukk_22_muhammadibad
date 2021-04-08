<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    protected $table = 'logs';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = ['id', 'event', 'person', 'detail'];
}
