<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Linea extends Model
{
    protected $table = 'linea';
    protected $primaryKey = 'id_linea';
    public $timestamps = false;

    public function actividades()
    {
        return $this->hasMany(Actividad::class, 'id_linea');
    }
}