<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;

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

    // Habilita la subida de archivos en un componente de Livewire
    use WithFileUploads;

    /** Agregamos las reglas de validación para los campos del formulario **/
    /** Cabe destacar que la variable debe llamarse "$rule" por convención de Laravel, sino no se tomarán las reglas **/
    protected $rules = [
        'titulo' => 'required|string',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen' => 'required|image|max:1024',
    ];

    public function crearVacante()
    {
        //$this->validate() => Toma las reglas asignadas por convención a la variable "$rules" y valida que se hayan cumplido las reglas.
        //                     Si se cumplieron todas las reglas los valores de los campos se asignan a la variable "datos"
        $datos = $this->validate();

        // Almacena la imagen fisica en el servidor
        // $this->imagen => Propiedad de la clase que contiene la Imagen Fisica
        // store('string') => Método que acepta como parametro una ruta donde se almacenará la Imagen Fisica
        $imagen = $this->imagen->store('public/vacantes');

        // Quitamos la ruta obtenida de la Imagen y solo obtenemos su nombre generado automaticamente por Laravel
        // Se almacenará en la siguiente ruta: "storage\app\public\vacantes\[NOMBRE IMAGEN].png"
        $datos['imagen'] = str_replace('public/vacantes/', '', $imagen);

        // Vacante => Modelo que hace referencia a la tabla "Vacante" de la base de datos, esta referencia se utiliza para crear, editar, mostrar y eliminar datos de la tabla "Vacante".
        // ::create => Método que realiza un INSERT en la tabla referida en el Modelo con los datos que contiene el array que se le pasa como parametro
        Vacante::create([
            'titulo' => $datos['titulo'],
            'salario_id' => $datos['salario'],
            'categoria_id' => $datos['categoria'],
            'empresa' => $datos['empresa'],
            'ultimo_dia' => $datos['ultimo_dia'],
            'descripcion' => $datos['descripcion'],
            'imagen' => $datos['imagen'],
            'user_id' => auth()->user()->id, // Como en el formulario de Alta de Vacanes se requiere estar logeado para visualiarla, podemos utilizar los datos de la Sesión
        ]);
    }


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
