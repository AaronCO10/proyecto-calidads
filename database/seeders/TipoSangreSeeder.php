<?php

namespace Database\Seeders;

use App\Models\TipoSangre;
use App\Models\BancoSangre;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TipoSangreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $tiposSangre = [
            'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'
            // Agrega aquí los tipos de sangre adicionales si es necesario
        ];

        // Iterar sobre el array y crear un registro para cada tipo de sangre
        foreach ($tiposSangre as $tipo) {
            $tipoSangre = TipoSangre::create([
                'nombre' => $tipo,
            ]);

            BancoSangre::create([
                'tipo_sangre_id' => $tipoSangre->id,
                'unidades' => 0,
            ]);
        }
    }
}
