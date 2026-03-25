<?php
namespace App\Http\Controllers;

use App\Models\Actividad;
use App\Models\Linea;
use App\Models\Componente;
use App\Models\Area;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    public function index()
    {
        // withCount no filtra, trae TODAS las actividades con sus líneas
        $actividades = Actividad::with('lineas.componente.area')->get();
        return view('crud.actividades.index', compact('actividades'));
    }

    public function create()
    {
        $areas       = Area::all();
        $componentes = Componente::all();
        $lineas      = Linea::all();
        return view('crud.actividades.create', compact('areas', 'componentes', 'lineas'));
    }

    public function store(Request $request)
    {
        $actividad = Actividad::create(['nombre' => $request->nombre]);
        // Vincula con la línea en la tabla pivote linea_actividad
        $actividad->lineas()->attach($request->id_linea);
        return redirect('/actividades')->with('success', 'Actividad creada');
    }

    public function edit($id)
    {
        $actividad   = Actividad::with('lineas')->findOrFail($id);
        $areas       = Area::all();
        $linea_actual = $actividad->lineas->first();
        $componentes = $linea_actual
            ? Componente::where('id_area', $linea_actual->componente->id_area)->get()
            : collect();
        $lineas = $linea_actual
            ? Linea::where('id_componente', $linea_actual->id_componente)->get()
            : collect();
        return view('crud.actividades.edit', compact('actividad', 'areas', 'componentes', 'lineas', 'linea_actual'));
    }

    public function update(Request $request, $id)
    {
        $actividad = Actividad::findOrFail($id);
        $actividad->nombre = $request->nombre;
        $actividad->save();
        // sync reemplaza la relación anterior
        $actividad->lineas()->sync([$request->id_linea]);
        return redirect('/actividades')->with('success', 'Actividad actualizada');
    }

    public function destroy($id)
    {
        $actividad = Actividad::findOrFail($id);
        $actividad->lineas()->detach(); // limpia la tabla pivote
        $actividad->delete();
        return redirect('/actividades')->with('success', 'Actividad eliminada');
    }

}