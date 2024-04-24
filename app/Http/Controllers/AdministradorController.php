<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Administrador;
use App\Models\Maestro;
use App\Models\Materia;
use App\Models\Grupo;


class AdministradorController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $alumnos = Alumno::all();
        $profesores = Maestro::all();
        $materias = Materia::all();
        $grupos = Grupo::all();
        return view('administradores.index', compact('user','alumnos', 'profesores', 'materias', 'grupos'));
    }
}
