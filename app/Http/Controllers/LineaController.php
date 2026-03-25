<?php
namespace App\Http\Controllers;

use App\Models\Linea;
use App\Models\Componente;
use App\Models\Area;
use Illuminate\Http\Request;

class LineaController extends Controller
{
    public function index()
    {
        $lineas = Linea::with('componente.area')->get();
        return view('crud.lineas.index', compact('lineas'));
    }

    public function create()
    {
        $areas       = Area::all();
        $componentes = Componente::all();
        return view('crud.lineas.create', compact('areas', 'componentes'));
    }

    public function store(Request $request)
    {
        Linea::create([
            'nombre'        => $request->nombre,
            'id_componente' => $request->id_componente,
        ]);
        return redirect('/lineas')->with('success', 'Línea creada');
    }

    public function edit($id)
    {
        $linea       = Linea::findOrFail($id);
        $areas       = Area::all();
        $componentes = Componente::where('id_area', $linea->componente->id_area)->get();
        return view('crud.lineas.edit', compact('linea', 'areas', 'componentes'));
    }

    public function update(Request $request, $id)
    {
        $linea = Linea::findOrFail($id);
        $linea->nombre        = $request->nombre;
        $linea->id_componente = $request->id_componente;
        $linea->save();
        return redirect('/lineas')->with('success', 'Línea actualizada');
    }

    public function destroy($id)
    {
        Linea::findOrFail($id)->delete();
        return redirect('/lineas')->with('success', 'Línea eliminada');
    }
}