<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory()->create([
            'name' => 'Maestro',
            'email' => 'maestro@gmail.com',
            'password' => 'hola',
            'role' => 'maestro',
        ]);

        User::factory()->create([
            'name' => 'Alumno',
            'email' => 'alumno@gmail.com',
            'password' => 'hola',
            'role' => 'alumno',
        ]);

        User::factory()->create([
            'name' => 'Administrativo',
            'email' => 'administrativo@gmail.com',
            'password' => 'hola',
            'role' => 'administrativo',
        ]);
    }
}
