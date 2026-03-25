<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Linea extends Model
{
    protected $table = 'linea';
    protected $primaryKey = 'id_linea';
    public $timestamps = false;
    protected $fillable = ['nombre', 'id_componente'];

    public function componente()
    {
        return $this->belongsTo(Componente::class, 'id_componente');
    }

    public function actividades()
    {
        return $this->belongsToMany(Actividad::class, 'linea_actividad', 'id_linea', 'id_actividad');
    }
}