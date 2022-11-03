<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
    // Habilita la subida de archivos en un componente de Livewire
    use WithFileUploads;
    public $cv;
    public $vacante;
    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function mount(Vacante $vacante)
    {
        $this->vacante = $vacante;
    }

    public function postularme()
    {

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

        // Crea la el Candidato a la Vacante

        // $this->vacante-candidatos() => Hacemos referencia a la relación entre el modelo "Vacante" y el modelo "Candidatos"
        // create() => Función equivalente al INSERT
        //  -> Parametro => Array con los respectivos nombres de los campos y los valores que se insertarán.
        //                  En este caso no hace falta insertar el ID de la Vacante por que ya estamos haciendo uso del Modelo de Vacantes y lo hacen en automatico
        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv' => $datos['cv']
        ]);

        // Crea la notificación y envía un email

        // Muestra al usuario un mensaje de ok

        // session()->flash('NOMBRE VARIABLE', 'VALOR DE LA VARIABLE') => Se utiliza para almacenar una variable de corta duración que se enviará
        // en la petición que se realice a continuación, pero esta se eliminará con la 2da petición que se realice.
        // En este caso lo utilizaremos para mostrar un mensaje al usuario en la página que será redireccionado, cabe destacar que este mensaje se eliminará cuando recarge la página.
        session()->flash('mensaje', 'Se envió correctamente tu información, mucha suerte');

        // redirect()->back() => Regresa a la página anterior.
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
