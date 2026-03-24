<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Componente;
use App\Models\Linea;
use App\Models\Actividad;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()
    {
        $areas = Area::all();
        return view('eventos.index', compact('areas'));
    }

    public function getComponentes($id)
    {
        return Componente::where('id_area', $id)->get();
    }

    public function getLineas($id)
    {
        return Linea::where('id_componente', $id)->get();
    }

    public function getActividades($id)
    {
        return Actividad::where('id_linea', $id)->get();
    }
}