<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;


class MateriaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:materias,name',
        ]);

        Materia::create($request->all());

        return redirect()->back()->with('success', 'Materia creada exitosamente.');
    }

    public function update(Request $request, Materia $materia)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:materias,name,' . $materia->id,
        ]);

        $materia->update($request->all());

        return redirect()->back()->with('success', 'Materia creada exitosamente.');
    }

    public function destroy(Materia $materia)
    {
        $materia->delete();

        return redirect()->back()->with('success', 'Materia creada exitosamente.');
    }
}
