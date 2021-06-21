<?php

namespace Tests\Feature\Empleados;

use App\Models\Empleado;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CRUDEmpleadosTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function an_authenticated_user_can_create_an_empleado()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);

        $empleado = Empleado::factory([
                'nombre' => 'Fernando',
                'apellido_paterno' => 'Ordaz',
                'apellido_materno' => 'Monreal'
            ])->raw();

        $this->post(route('empleados.store',$empleado));

        $this->assertDatabaseHas('empleados', [
            'nombre' => 'Fernando',
            'apellido_paterno' => 'Ordaz',
            'apellido_materno' => 'Monreal',
            'estado' => true
        ]);
    }

    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function an_authenticated_user_can_delete_an_empleado()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);

        $empleado = Empleado::factory([
            'nombre' => 'user deleted'
        ])->create();

        $this->delete(route('empleados.destroy', $empleado));

        $this->assertDatabaseHas('empleados', [
            'nombre' => 'user deleted',
            'estado' => false
        ]);

        $this->assertDatabaseMissing('empleados', [
            'nombre' => 'user deleted',
            'estado' => true
        ]);

        $this->assertDatabaseCount('empleados', 1);
    }
}
