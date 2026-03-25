<?php
namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::all();
        return view('crud.areas.index', compact('areas'));
    }

    public function create()
    {
        return view('crud.areas.create');
    }

    public function store(Request $request)
    {
        Area::create(['nombre' => $request->nombre]);
        return redirect('/areas')->with('success', 'Área creada');
    }

    public function edit($id)
    {
        $area = Area::findOrFail($id);
        return view('crud.areas.edit', compact('area'));
    }

    public function update(Request $request, $id)
    {
        $area = Area::findOrFail($id);
        $area->nombre = $request->nombre;
        $area->save();
        return redirect('/areas')->with('success', 'Área actualizada');
    }

    public function destroy($id)
    {
        Area::findOrFail($id)->delete();
        return redirect('/areas')->with('success', 'Área eliminada');
    }
}