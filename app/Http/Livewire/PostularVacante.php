<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PostularVacante extends Component
{

    public $cv;
    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function postularme(){

        // Valida el formulario de postulación
        $datos = $this->validate();

        // Crea la vacante

        // Crea la notificación y envía un email

        // Muestra al usuario un mensaje de ok

    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
