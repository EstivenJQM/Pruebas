<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'area';
    protected $primaryKey = 'id_area';
    public $timestamps = false;

    public function componentes()
    {
        return $this->hasMany(Componente::class, 'id_area');
    }
}