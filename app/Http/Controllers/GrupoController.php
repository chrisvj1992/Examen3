<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;


class GrupoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'materia_id' => 'required|exists:materias,id',
        ]);

        Grupo::create([
            'materia_id' => $request->materia_id,
            'maestro_id' => auth()->user()->maestro->id,
        ]);

        return redirect()->route('profesores.index')->with('success', '¡Grupo creado satisfactoriamente!');
    }

    public function store_admin(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'materia_id' => 'required|exists:materias,id', 
            'profesor_id' => 'required|exists:maestros,id',
        ]);

        // Crea un nuevo grupo
        $grupo = Grupo::create([
            'materia_id' => $request->input('materia_id'),
            'maestro_id' => $request->input('profesor_id'),
        ]);

        return redirect()->back()->with('success', 'Grupo creado exitosamente.');
    }

    public function update(Request $request, Grupo $grupo)
{
    // Valida los datos del formulario
    $request->validate([
        'materia_id' => 'required|exists:materias,id', // Asegúrate de que la materia seleccionada exista en la tabla de materias
        'profesor_id' => 'required|exists:maestros,id', // Cambia 'maestro_id' a 'profesor_id' y valida su existencia en la tabla de maestros
    ]);

    // Actualiza los datos del grupo
    $grupo->update([
        'materia_id' => $request->input('materia_id'),
        'maestro_id' => $request->input('profesor_id'), // Cambia 'maestro_id' a 'profesor_id' para reflejar el cambio en el formulario
    ]);

    return redirect()->back()->with('success', 'Grupo actualizado exitosamente.');
}

public function destroy(Grupo $grupo)
{
    // Elimina el grupo
    $grupo->delete();

    return redirect()->back()->with('success', 'Grupo eliminado exitosamente.');
}

}
