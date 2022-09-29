<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use Livewire\Component;
// Los PHP de los componentes tienen la funcionalidad similar a la de un Controlador de Laravel
class CrearVacante extends Component
{

    /** Creamos los atributos que se conectaran con los campos del Frontend mediante Livewiere **/

    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;

    /** Agregamos las reglas de validación para los campos del formulario **/
    protected $rules = [
        'titulo' => 'required|string',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen' => 'required',
    ];


    public function render()
    {
        // Consultar BD
        $salarios = Salario::all();
        $categorias = Categoria::all();

        // Le pasamos al HTML del componente el resultado obtenido de la query a la BD
        return view('livewire.crear-vacante', [
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}
