<?php

namespace Tests\Feature\Empleados;

use App\Models\Empleado;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CRUDEmpleadosTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function an_authenticated_user_can_create_an_empleado()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $empleado = Empleado::factory([
                'nombe' => 'Fernando',
                'apellido_paterno' => 'Ordaz',
                'apellido_materno' => 'Monreal'
            ])->raw();
        $response = $this->post(route('empleados.index'),);

        $response->assertStatus(200);
    }
}
