<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logging extends Model
{
    protected $table = 'activity_logs';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = ['id', 'event', 'person', 'detail', 'person', 'name', 'role'];
}
