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



        // Esto es el equialente a:

        /*

            SELECT * FROM devjobs.vacantes v
                INNER JOIN devjobs.categorias c ON  v.categoria_id = c.id
                INNER JOIN devjobs.salarios s ON v.salario_id = s.id
            WHERE  (v.categoria_id = 1
                AND v.salario_id = 6
                AND v.titulo LIKE '%PHP%')
            OR
                (v.categoria_id = 1
                AND v.salario_id = 6
                AND v.empresa LIKE '%Face%')

        */
        $vacantes = Vacante::when($this, function($query){
            $query->where('categoria_id', $this->categoria);
            $query->where('salario_id', $this->salario);
            $query->where('titulo', 'LIKE', "%$this->termino%");
        })
        ->when($this, function($query){
            $query->orWhere('empresa', 'LIKE', "%$this->termino%"); // Separá la condición con el operador OR, por lo tanto si el filtro anterior es vacio, se ejecuta este.
            $query->where('categoria_id', $this->categoria);
            $query->where('salario_id', $this->salario);
        })
        ->paginate(20); // Página los resultados obtenidos la query ejecutada

        return view('livewire.home-vacantes',[
            'vacantes' => $vacantes
        ]);
    }
}
