<?php

namespace Tests\Feature;

use App\Http\Controllers\BannerController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User; // Asegúrate de importar el modelo User

class BannerControllerTest extends TestCase
{
    

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutMiddleware(\App\Http\Middleware\Authenticate::class);
    }

    /**
     * Test the store method of the BannerController.
     */
    public function testStore()
    {
        $data = [
            'nombre' => 'John',
            'apellido' => 'Doe',
            'edad' => 25,
            'telefono' => '123456789',
            'email' => 'johndoe@example.com',
            'tipo' => 'A+',
            'terminos' => 'Aceptada',
            'verificacion' => 'Proceso',
            'comentario' => 'nn',



            // Add other required fields here
        ];

        $response = $this->post('/banner', $data); // Cambia la ruta a '/banner'

        $response->assertStatus(302); // Check that the response is a redirect
        $response->assertRedirect('/'); // Check that it redirects to the specified URL
        // Add more assertions as needed
    }//
}

