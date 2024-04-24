<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Grupo;
use App\Models\Calificacion;
use App\Models\User;
use App\Models\Alumno;




class AlumnoController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $idsGruposInscritos = $user->grupos()->pluck('grupos.id');
        
        $gruposDisponibles = Grupo::whereNotIn('id', $idsGruposInscritos)->get();

        $gruposInscritos = $user->grupos;

        return view('alumnos.index', compact('user', 'gruposDisponibles', 'gruposInscritos'));
    }

    public function registrarGrupo(Request $request)
    {
        $user = Auth::user();

        $grupoId = $request->input('grupo');

        // Registrar al alumno en el grupo seleccionado
        Calificacion::create([
            'grupo_id' => $grupoId,
            'alumno_id' => $user->id,
            'calificacion' => 0,
        ]);

        return redirect()->route('alumnos.index');
    }

    public function store(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        // Crea un nuevo usuario
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        // Asociar al usuario como alumno
        $alumno = new Alumno();
        $alumno->user_id = $user->id;
        $alumno->save();

        return redirect()->back()->with('success', 'Alumno creado exitosamente.');
    }

    public function update(Request $request, Alumno $alumno)
    {
        // Valida los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $alumno->user->id,
        ]);

        // Actualiza los datos del usuario asociado al alumno
        $alumno->user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        return redirect()->back()->with('success', 'Alumno actualizado exitosamente.');
    }

    public function destroy(Alumno $alumno)
    {
        // Elimina al alumno y al usuario asociado
        $alumno->user->delete();

        return redirect()->back()->with('success', 'Alumno eliminado exitosamente.');
    }
}
