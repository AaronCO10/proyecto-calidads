<?php

namespace Tests\Feature;

use App\Models\Donadore;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class DonadoreControllerTest extends TestCase
{
    

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutMiddleware(\App\Http\Middleware\Authenticate::class);
    }

    // pruebas 
    /**
 * Test the store method of the DonadoreController.
 */
public function testStore()
{
    $data = [
        'usuario' => 'john',
        'dni' => '72786734',
        'talla' => 170,
        'fnacimiento' => '2000-10-05',
        'peso' => 70,
        'sexo' => 'M',
        'fecha' => '2020-10-05',
        'tipo' => 'A+',
        'telefono' => '92123722',
        'correo' => 'salazar9@gmail.com',
        'terminos' => 'Aceptado',



        // Add other required fields here
    ];

    $response = $this->post('/donadore.Store', $data);
    $response->assertStatus(404); // Check that the response is a redirect

    $response->assertRedirect('/principal'); // Check that it redirects to the specified URL

    // Verifica que los datos se hayan almacenado en la base de datos correctamente
    $this->assertDatabaseHas('donadores', [
        'usuario' => 'john',
        'dni' => '72786734',
        'talla' => 170,
        'fnacimiento' => '2000-10-05',
        'peso' => 70,
        'sexo' => 'M',
        'fecha' => '2023-10-05',
        'tipo' => 'A+',
        'telefono' => '92123722',
        'correo' => 'salazar9@gmail.com',
        'terminos' => 'Aceptado',
    ]);

    // Add more assertions as needed
}
}
