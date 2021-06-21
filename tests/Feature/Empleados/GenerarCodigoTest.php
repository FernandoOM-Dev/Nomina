<?php

namespace Tests\Feature\Empleados;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Empleado;

class GenerarCodigoTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function an_code_is_generated_for_each_empleado()
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
            'codigo' => 'ord-fer-1',
        ]);
    }
}
