<?php
namespace App\Http\Controllers;

use App\Models\Componente;
use App\Models\Area;
use Illuminate\Http\Request;

class ComponenteController extends Controller
{
    public function index()
    {
        $componentes = Componente::with('area')->get();
        return view('crud.componentes.index', compact('componentes'));
    }

    public function create()
    {
        $areas = Area::all();
        return view('crud.componentes.create', compact('areas'));
    }

    public function store(Request $request)
    {
        Componente::create([
            'nombre'  => $request->nombre,
            'id_area' => $request->id_area,
        ]);
        return redirect('/componentes')->with('success', 'Componente creado');
    }

    public function edit($id)
    {
        $componente = Componente::findOrFail($id);
        $areas = Area::all();
        return view('crud.componentes.edit', compact('componente', 'areas'));
    }

    public function update(Request $request, $id)
    {
        $componente = Componente::findOrFail($id);
        $componente->nombre  = $request->nombre;
        $componente->id_area = $request->id_area;
        $componente->save();
        return redirect('/componentes')->with('success', 'Componente actualizado');
    }

    public function destroy($id)
    {
        Componente::findOrFail($id)->delete();
        return redirect('/componentes')->with('success', 'Componente eliminado');
    }
}