<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MostrarAlerta extends Component
{
    // Al definir este atributo, se podrá utilizar en el Frontend e imprimir el valor que se pasó como parametro al llamar al componente
    public $message;

    public function render()
    {
        return view('livewire.mostrar-alerta');
    }
}
