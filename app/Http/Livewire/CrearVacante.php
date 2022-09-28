<?php

namespace App\Http\Livewire;

use App\Models\Salario;
use Livewire\Component;
// Los PHP de los componentes tienen la funcionalidad similar a la de un Controlador de Laravel
class CrearVacante extends Component
{
    public function render()
    {
        // Consultar BD
        $salarios = Salario::all();

        // Le pasamos al HTML del componente el resultado obtenido de la query a la BD
        return view('livewire.crear-vacante', [
            'salarios' => $salarios
        ]);
    }
}
