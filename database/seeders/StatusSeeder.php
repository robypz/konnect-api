<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            /**- Pendiente: Tarea identificada, pero aún no iniciada.
                - En progreso: Se está trabajando activamente en la tarea.
                - En revisión: Se ha completado la tarea y está siendo revisada o probada.
                - Aprobada: Se ha revisado la tarea y está lista para su implementación.
                - Bloqueada: No puede avanzar debido a un obstáculo o dependencia.
                - Completada: La tarea se ha finalizado con éxito.
                - Cancelada: Se decidió no continuar con la tarea.
                - Esperando respuesta: Depende de la acción o aprobación de otra persona o equipo.
                - En pruebas: Se está validando el funcionamiento o la calidad de la tarea.
                - Archivada: No está en curso, pero se guarda para referencia futura.
             */
            ['name' => 'Pendiente', 'description' => 'Tarea identificada, pero aún no iniciada.'],
            ['name' => 'En progreso', 'description' => 'Se está trabajando activamente en la tarea.'],
            ['name' => 'En revisión', 'description' => 'Se ha completado la tarea y está siendo revisada o probada.'],
            ['name' => 'Aprobada', 'description' => 'Se ha revisado la tarea y está lista para su implementación.'],
            ['name' => 'Bloqueada', 'description' => 'No puede avanzar debido a un obstáculo o dependencia.'],
            ['name' => 'Completada', 'description' => 'La tarea se ha finalizado con éxito.'],
            ['name' => 'Cancelada', 'description' => 'Se decidió no continuar con la tarea.'],
            ['name' => 'Esperando respuesta', 'description' => 'Depende de la acción o aprobación de otra persona o equipo.'],
            ['name' => 'En pruebas', 'description' => 'Se está validando el funcionamiento o la calidad de la tarea.'],
            ['name' => 'Archivada', 'description' => 'No está en curso, pero se guarda para referencia futura.'],

        ];

        foreach ($statuses as $status) {
            Status::create($status);
        }
    }
}
