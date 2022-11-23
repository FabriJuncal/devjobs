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

    }

    public function render()
    {

        // Vacante::all() => Trae todas las vacantes sin filtras.
        // Es equivalente a SELECT * FROM vacantes
        // $vacantes = Vacante::all();

        // Vacante::when() => Trae todas las vacantes cuando se ejecuta por 1ra vez la petición y el campo "termino" se encuentra vacio
        // Es equivalente a SELECT * FROM WHERE titulo LIKE '%LO QUE TRAIGA EL CAMPO termino%'

        // 1er Parametro => Campo que tendrá los valores por el cual se va a filtrar
        // 2do Parametro => Callback / Función que recibe en automaticó el parametro "$query", aquí dentro se puede ejecutar un lógica
        //                  como por ejemplo el WHERE que tenemos en este caso filtrando por el campo "titulo"
        $vacantes = Vacante::when($this->termino, function($query){

            $query->where('titulo', 'LIKE', "%$this->termino%");

        })->paginate(20); // Página los resultados obtenidos la query ejecutada

        return view('livewire.home-vacantes',[
            'vacantes' => $vacantes
        ]);
    }
}
