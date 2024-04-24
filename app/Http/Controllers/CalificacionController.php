<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calificacion;


class CalificacionController extends Controller
{
    public function update(Request $request, $alumno_id, $grupo_id)
    {
        $calificacion = Calificacion::where('alumno_id', $alumno_id)->where('grupo_id', $grupo_id)->first();

        if ($calificacion) {
            $calificacion->calificacion = $request->calificacion;
            $calificacion->save();

            return redirect()->back()->with('success', 'Calificación actualizada correctamente.');
        } else {
            return redirect()->back()->with('error', 'No se encontró la calificación.');
        }
    }
}
