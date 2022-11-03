<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
    // Habilita la subida de archivos en un componente de Livewire
    use WithFileUploads;
    public $cv;
    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function postularme(){

        // VALIDAR FORMULARIO
        //$this->validate() => Toma las reglas asignadas por convención a la variable "$rules" y valida que se hayan cumplido las reglas.
        //                     Si se cumplieron todas las reglas los valores de los campos se asignan a la variable "datos"
        $datos = $this->validate();

        // ALMACENAR CV
        // Almacena el CV fisico en el servidor
        // $this->CV => Propiedad de la clase que contiene el CV Fisico
        // store('string') => Método que acepta como parametro una ruta donde se almacenará el CV Fisico
        $cv = $this->cv->store('public/cv');

        // Quitamos la ruta obtenida de el CV y solo obtenemos su nombre generado automaticamente por Laravel
        // Se almacenará en la siguiente ruta: "storage\app\public\cv\[NOMBRE CV].png"
        $datos['cv'] = str_replace('public/cv/', '', $cv);

        // Crea la vacante

        // Crea la notificación y envía un email

        // Muestra al usuario un mensaje de ok

    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
