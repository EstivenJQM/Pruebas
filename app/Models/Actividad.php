<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = 'actividad';
    protected $primaryKey = 'id_actividad';
    public $timestamps = false;
    protected $fillable = ['nombre'];

    public function lineas()
    {
        return $this->belongsToMany(Linea::class, 'linea_actividad', 'id_actividad', 'id_linea');
    }
}