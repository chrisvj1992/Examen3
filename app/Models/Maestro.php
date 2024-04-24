<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;



class Maestro extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'materia_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }

    public function grupos()
    {
        return $this->hasMany(Grupo::class);
    }
    
    public function alumnos(): HasManyThrough
    {
        return $this->hasManyThrough(Alumno::class, Materia::class, 'maestro_id', 'materia_id');
    }
}
