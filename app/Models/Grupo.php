<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Grupo extends Model
{
    use HasFactory;
    protected $fillable = [
        'materia_id',
        'maestro_id',
    ];

    public function calificaciones()
    {
        return $this->hasMany(Calificacion::class);
    }
    
    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }

    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class, 'calificacions', 'grupo_id', 'alumno_id');
    }
}
