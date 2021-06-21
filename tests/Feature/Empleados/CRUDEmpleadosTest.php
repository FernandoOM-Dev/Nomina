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
    public function an_authenticated_user_can_update_an_empleado()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);

        $empleado = Empleado::factory([
                'nombre' => 'Fernando_old',
                'apellido_paterno' => 'Ordaz_old',
                'apellido_materno' => 'Monreal_old'
            ])->create();

        $empleado->nombre = 'Fernando_new';
        $empleado->apellido_paterno = 'Ordaz_new';
        $empleado->apellido_materno = 'Monreal_new';

        $this->put(route('empleados.update',$empleado),$empleado->toArray());

        $this->assertDatabaseHas('empleados', [
            'nombre' => 'Fernando_new',
            'apellido_paterno' => 'Ordaz_new',
            'apellido_materno' => 'Monreal_new',
        ]);
        $this->assertDatabaseMissing('empleados', [
            'nombre' => 'Fernando_old',
            'apellido_paterno' => 'Ordaz_old',
            'apellido_materno' => 'Monreal_old'
        ]);
    }

    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function an_authenticated_user_can_desactivate_an_empleado()
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

    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function an_authenticated_user_can_activate_an_empleado()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);

        $empleado = Empleado::factory([
            'nombre' => 'user deleted'
        ])->create();

        $this->post(route('empleados.activate', $empleado));

        $this->assertDatabaseHas('empleados', [
            'nombre' => 'user deleted',
            'estado' => true
        ]);

        $this->assertDatabaseMissing('empleados', [
            'nombre' => 'user deleted',
            'estado' => false
        ]);

        $this->assertDatabaseCount('empleados', 1);
    }
}
