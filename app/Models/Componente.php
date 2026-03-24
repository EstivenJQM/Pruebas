<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Componente extends Model
{
    protected $table = 'componente';
    protected $primaryKey = 'id_componente';
    public $timestamps = false;

    public function lineas()
    {
        return $this->hasMany(Linea::class, 'id_componente');
    }
}