<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'unit';
    public $primaryKey = 'id_unit';

    protected $guarded  = ['id_unit'];

    public $timestamps = false;
}