<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\MaestroController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\CalificacionController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\PdfController;



Route::get('/', function () {
    return view('welcome');
})->name('welcome');

//Route AlumnoController
Route::get('/alumnos/index', [AlumnoController::class, 'index'])->name('alumnos.index');

Route::get('/alumnos/generar-pdf',[PdfController::class, 'generarPdf'])->name('generar-pdf');

Route::post('/alumnos/registrar-grupo', [AlumnoController::class, 'registrarGrupo'])->name('registrar-grupo');


//Route MaestroController
Route::get('/profesores/index', [MaestroController::class, 'index'])->name('profesores.index');


//Route AuthController
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


//Route GrupoController
Route::post('/profesores/index', [GrupoController::class, 'store'])->name('grupos.store');

//Route CalificacionController
Route::put('calificaciones/{alumno_id}/{grupo_id}', [CalificacionController::class, 'update'])->name('calificaciones.update');

//Route AdministradorController
Route::get('/administradores', [AdministradorController::class, 'index'])->name('administradores.index');
    // Rutas para la gestión de alumnos
    Route::post('/alumnos', [AlumnoController::class, 'store'])->name('alumnos.store'); // Crear alumno
    Route::put('/alumnos/{alumno}', [AlumnoController::class, 'update'])->name('alumnos.update'); // Actualizar alumno
    Route::delete('/alumnos/{alumno}', [AlumnoController::class, 'destroy'])->name('alumnos.destroy'); // Eliminar alumno
    
    // Rutas para la gestión de profesores
    Route::post('/profesores', [MaestroController::class, 'store'])->name('profesores.store');
    Route::put('/profesores/{profesor}', [MaestroController::class, 'update'])->name('profesores.update');
    Route::delete('/profesores/{profesor}', [MaestroController::class, 'destroy'])->name('profesores.destroy');
    
    // Rutas para la gestión de materias
    Route::post('/materias', [MateriaController::class, 'store'])->name('materias.store');
    Route::put('/materias/{materia}', [MateriaController::class, 'update'])->name('materias.update');
    Route::delete('/materias/{materia}', [MateriaController::class, 'destroy'])->name('materias.destroy');

    // Rutas para la gestión de Grupos
    Route::post('/grupos', [GrupoController::class, 'store_admin'])->name('grupos.store_admin'); // Crear grupo
    Route::put('/grupos/{grupo}', [GrupoController::class, 'update'])->name('grupos.update'); // Actualizar grupo
    Route::delete('/grupos/{grupo}', [GrupoController::class, 'destroy'])->name('grupos.destroy'); // Eliminar grupo