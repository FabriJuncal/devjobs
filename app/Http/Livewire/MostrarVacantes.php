<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class MostrarVacantes extends Component
{
    public function render()
    {
        // Obtenemos las vacantes filtradas por el ID USUARIO que se encuentra logeado y lo páginamos en 10 páginas
        $vacantes = Vacante::where('user_id', auth()->user()->id)->paginate(10);

        // Enviamos la variable "vacantes" a la vista del componente
        return view('livewire.mostrar-vacantes', [
            'vacantes' => $vacantes
        ]);
    }
}
