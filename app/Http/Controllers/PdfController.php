<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use PDF;

class PdfController extends Controller
{
    public function generarPdf()
    {
        $user = Auth::user();
        $gruposInscritos = $user->grupos()->with('materia')->get();

        $pdf = PDF::loadView('alumnos.calificaciones', compact('user', 'gruposInscritos'));

        return $pdf->download('calificaciones.pdf');
    }
}
