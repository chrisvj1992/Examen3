<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Maestro;
use App\Models\User;
use App\Models\Materia;


class MaestroController extends Controller
{
    public function index()
    {
        // Obtener el usuario autenticado actualmente
        $user = auth()->user();

        // Obtener el maestro asociado al usuario
        $maestro = $user->maestro;

        // Obtener los grupos asociados al maestro con sus alumnos
        $grupos = $maestro->grupos()->with('materia', 'alumnos')->get();

        // Obtener la lista de materias disponibles
        $materias = Materia::all();

        // Pasar los datos a la vista
        return view('profesores.index', compact('user', 'grupos', 'materias'));
    }

    public function store(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'materia_id' => 'required|exists:materias,id', // Asegúrate de que la materia seleccionada exista en la tabla de materias
            'password' => 'required|string|min:8',
        ]);

        // Crea un nuevo usuario
        $user = User::create([
            'name' => $request->input('nombre'), // Cambia 'name' a 'nombre'
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        // Asocia al usuario como profesor y asigna la materia correspondiente
        $profesor = new Maestro();
        $profesor->user_id = $user->id;
        $profesor->materia_id = $request->input('materia_id');
        $profesor->save();

        return redirect()->back()->with('success', 'Profesor creado exitosamente.');
    }


    public function update(Request $request, Maestro $profesor)
    {
        // Valida los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $profesor->user->id,
        ]);

        // Actualiza los datos del usuario asociado al profesor
        $profesor->user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        return redirect()->back()->with('success', 'Profesor actualizado exitosamente.');
    }

    public function destroy(Maestro $profesor)
    {
        // Elimina al profesor y al usuario asociado
        $profesor->user->delete();

        return redirect()->back()->with('success', 'Profesor eliminado exitosamente.');
    }
}
