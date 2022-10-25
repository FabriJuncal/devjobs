<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

// Los PHP de los componentes tienen la funcionalidad similar a la de un Controlador de Laravel
class EditarVacante extends Component
{
    /** Creamos los atributos que se conectaran con los campos del Frontend mediante Livewiere **/
    public $vacante_id;
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;
    public $imagen_nueva;

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
        'imagen_nueva' => 'nullable|image|max:1024' // => Estas reglas indican que: el campo puede ser nulo, pero en el caso que contenga algo debe ser una imagen y maximo debe pesar 1mb
    ];

    public function mount(Vacante $vacante)
    {
        $this->vacante_id = $vacante->id;
        $this->titulo = $vacante->titulo;
        $this->salario = $vacante->salario_id;
        $this->categoria = $vacante->categoria_id;
        $this->empresa = $vacante->empresa;
        // Carbon::parse() => Clase que tiene funcionalidades para formatear valores
        // Parametro => Se le pasa cualquier valor como parametro donde este será formateado posteriormente
        // ->format('Y-m-d') => Formatea la fecha
        $this->ultimo_dia = Carbon::parse( $vacante->ultimo_dia )->format('Y-m-d');
        $this->descripcion = $vacante->descripcion;
        $this->imagen = $vacante->imagen;
    }

    public function editarVacante(){

        // Validamos los campos tomando las reglas del array "$rules"
        // $this->validate() => Valida los campos y retorna un array
        $datos = $this->validate();

        // Si hay una nueva imagen
        if($this->imagen_nueva){
            // ALMACENAR IMAGEN
            // Almacena la imagen fisica en el servidor
            // $this->imagen => Propiedad de la clase que contiene la Imagen Fisica
            // store('string') => Método que acepta como parametro una ruta donde se almacenará la Imagen Fisica
            $imagen = $this->imagen_nueva->store('public/vacantes');

            // Quitamos la ruta obtenida de la Imagen y solo obtenemos su nombre generado automaticamente por Laravel
            // Se almacenará en la siguiente ruta: "storage\app\public\vacantes\[NOMBRE IMAGEN].png"
            $datos['imagen'] = str_replace('public/vacantes/', '', $imagen);
        }

        // Se busca la vacante a editar
        $vacante = Vacante::find($this->vacante_id);

        // Se asigna los valores
        $vacante->titulo = $datos['titulo'];
        $vacante->salario_id = $datos['salario'];
        $vacante->categoria_id = $datos['categoria'];
        $vacante->empresa = $datos['empresa'];
        $vacante->ultimo_dia = $datos['ultimo_dia'];
        $vacante->descripcion = $datos['descripcion'];
        $vacante->imagen = $datos['imagen'] ?? $vacante->imagen;

        // Se guarda la vacante
        $vacante->save();

        // session()->flash('NOMBRE VARIABLE', 'VALOR DE LA VARIABLE') => Se utiliza para almacenar una variable de corta duración que se enviará
        // en la petición que se realice a continuación, pero esta se eliminará con la 2da petición que se realice.
        // En este caso lo utilizaremos para mostrar un mensaje al usuario en la página que será redireccionado, cabe destacar que este mensaje se eliminará cuando recarge la página.
        session()->flash('mensaje', 'La vacante se actualizó correctamente.');

        // REDIRECCIONAR AL USUARIO
        // redirect()->route('ALIAS DE LA RUTA') => Esta función se utiliza para redireccionar al usuario,
        // se le pasa como parametro el Alias que se agregó en algunos de los archivos del siguiente directorio: "routes/"
        return redirect()->route('vacantes.index');

    }

    public function render()
    {
        // Consultar BD
        $salarios = Salario::all();
        $categorias = Categoria::all();

        return view('livewire.editar-vacante',  [
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}
