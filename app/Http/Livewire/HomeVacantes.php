<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class HomeVacantes extends Component
{

    public $termino;
    public $categoria;
    public $salario;

    // Se ejecuta con la función "$this->emit()" haciendo referencia al 1er parametro
    // En este casó sería "terminosBusqueda" que esta enlazado a la función "buscar"
    // Por lo tanto al ejecutar el Emit pasandole como parametro el Listener, este ejecutará la función "buscar()"
    protected $listeners = ['terminosBusqueda' => 'buscar'];

    public function buscar($termino, $categoria, $salario)
    {
        $this->termino = $termino;
        $this->categoria = $categoria;
        $this->salario = $salario;

        dd("$this->termino, $this->categoria, $this->salario");

    }

    public function render()
    {

        $vacantes = Vacante::all();

        return view('livewire.home-vacantes',[
            'vacantes' => $vacantes
        ]);
    }
}
