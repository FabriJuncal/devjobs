<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class MostrarVacantes extends Component
{

    // public  = ['prueba1', 'prueba2', 'etc..] => Este array debe ser escrito tal cual esta para que funcione. Así "$listeners"
    // Lo que hace este array es almacenar todos los métodos habilitados para ser ejecutados por eventos (en este caso "wire:click" que ejecuta el méotodo "prueba")
    // en el archivo "resources\views\livewire\mostrar-vacantes.blade.php" Linea 33

    public $listeners = ['prueba'];

    public function prueba($vacante_id)
    {
        dd('Desde el Código de PHP => ID nro: ' . $vacante_id);
    }

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
