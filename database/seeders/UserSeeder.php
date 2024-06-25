<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;




class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@donadoresperu.com',
            'email_verified_at' => now(),
            'password' => '123456789', // password
            'remember_token' => Str::random(10),
            'nombres' => 'Admin',
            'apellidos' => 'Admin',
            'dni' => '12345678',
            'fecha_nacimiento' => '1990-01-01',
            'sexo' => 'Masculino',
            'tipo_sangre_id' => 1,
            'telefono' => '123456789',
        ])->assignRole('admin');

        User::create([
            'name' => 'luis',
            'email' => 'luis@donadoresperu.com',
            'email_verified_at' => now(),
            'password' => '123456789', // password
            'remember_token' => Str::random(10),
            'nombres' => 'Luis',
            'apellidos' => 'Pajares',
            'dni' => '87654321',
            'fecha_nacimiento' => '1995-05-05',
            'sexo' => 'Masculino',
            'tipo_sangre_id' => 2,
            'telefono' => '987654321',
        ])->assignRole('donador');
    }
}
