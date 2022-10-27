<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class MostrarVacantes extends Component
{

    // public  = ['prueba1', 'prueba2', 'etc..] => Este array debe ser escrito tal cual esta para que funcione. Así "$listeners"
    // Lo que hace este array es almacenar todos los métodos habilitados que pueden ser ejecutados por eventos:
    // Como por ejemplo:

    //  "wire:click="$emit('mostrarAlerta', {{ $vacante->id }}) => En este caso ejecutamos el método "mostrarAlerta" desde JS al hacer click
    // en el archivo "resources\views\livewire\mostrar-vacantes.blade.php" Linea 33

    // O tambien un método en PHP puede ser ejecutado con:

    // "Livewire.emit('eliminarVacante')" => De esta manera ejecutamos el método "eliminarVacante" desde JS sin necesidad de esperar a que se ejecute un método
    // en el archivo "resources\views\livewire\mostrar-vacantes.blade.php" Linea 67

    public $listeners = ['eliminarVacante'];


    // (Vacante $vacante) => De esta manera instanciamos el modelo de manera automatica y gracias al Route Model Binding de Laravel y obtendremos toda los datos de la vacante.
    //                      Es decir, desde el Front enviamos "eliminarVacante([ID VACANTE])" y al instanciar el modelo y tener el ID de la Vacante, por detras se ejecuta una
    //                      Query que sería algo como "SELECT * FROM Vacante WHERE id = [ID VACANTE]"
    public function eliminarVacante(Vacante $vacante)
    {
        // Gracias al ORM de Laravel llamado Eloquent podremos eliminar un registro de la siguiente manera, donde:
        // $vacante => Es una instancia del Modelo "Vacante" y se tiene el registro de ese ID
        // ->delete() => Es el equivalente de "DELETE INTO Vacante WHERE id = [ID VACANTE] (Al tener la instancia del modelo ya se obtiene el ID de manera automatica gracias al Route Model Binding de Laravel)
        $vacante->delete();
    }

    public function render()
    {
        // Obtenemos las vacantes filtradas por el ID USUARIO que se encuentra logeado y lo páginamos en 10 páginas
        $vacantes = Vacante::where('user_id', auth()->user()->id)->paginate(10);

        // Enviamos la variable "vacantes" a la vista del componente
        return view('livewire.mostrar-vacantes', [
            'vacantes' => $vacantes
        ]);
    }
}
