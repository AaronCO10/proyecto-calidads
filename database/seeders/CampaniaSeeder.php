<?php

namespace Database\Seeders;

use App\Models\Campania;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CampaniaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Campania::create([
            'nombre' => 'Primera Campaña',
            'fecha_inicio' => now()]);
    }
}
