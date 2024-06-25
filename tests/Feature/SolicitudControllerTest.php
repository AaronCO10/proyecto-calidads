<?php

namespace Tests\Feature;

use App\Models\Solicitud;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use Tests\TestCase;
class SolicitudControllerTest extends TestCase
{
    use WithFaker; // Para generar datos aleatorios
    use WithoutMiddleware; // Para deshabilitar temporalmente el middleware de autenticación
    /**
     * A basic feature test example.
     */
    public function testStore()
    {
        // Genera datos de prueba que cumplan con las restricciones de validación
        $data = [
            'solicitante' => 'familiar', // Asegúrate de que sea 'usuario' o 'familiar'
            'nombre_apellidos' => 'John Doe', // Asegúrate de que sea un nombre válido
            'DNI' => '12345678', // Asegúrate de que sea un DNI válido como cadena
            'tipo_sangre' => 'A-', // Asegúrate de que sea un tipo de sangre válido
            'terminos' => 'Aceptado', // Asegúrate de que sea un tipo de sangre válido
        ];

        // Realiza una solicitud POST al método store con los datos generados
        $response = $this->post(route('solicitud.Store'), $data);

        // Comprueba si la solicitud se procesó correctamente y redirigió a la página correcta
        $response->assertStatus(302); // Código 302 indica una redirección
        $response->assertRedirect(route('donadore?busqueda=A-')); // Verifica que se redirija a la página correcta

        // Comprueba si los datos se almacenaron correctamente en la base de datos
        $this->assertDatabaseHas('solicitud', $data);
    }
}
