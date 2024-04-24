<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function grupos()
    {
        return $this->hasMany(Grupo::class);
    }

    public function maestros()
    {
        return $this->hasMany(Maestro::class);
    }
}
