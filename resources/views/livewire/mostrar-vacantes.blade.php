<div>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        {{-- @forelse => Es una mescla entre un "foreach" y un "if", lo que hace es iterar sobre el array si este contiene registros, y si este no contiene registros ejecuta el código del "@empty"--}}
        @forelse ($vacantes as $vacante )
            <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
                <div class="leading-10">
                    <a href="{{ route('vacantes.show', $vacante->id) }}" class="text-xl font-bold">
                        {{ $vacante->titulo }}
                    </a>
                    <p class="text-sm text-gray-600 font-bold" > {{ $vacante->empresa }} </p>
                    {{-- format('d/m/Y') => Formatea la Fecha, pero antes se deberá configurar el modelo (en este caso el modelo "Vacante") --}}
                    {{-- La condiguración se realizó en la siguiente ubicación: --}}
                    {{-- app\Models\Vacante.php --}}
                    <p class="text-sm text-gray-500"> Último día: {{ $vacante->ultimo_dia->format('d/m/Y') }} </p>
                </div>

                <div class="flex flex-col md:flex-row items-stretch gap-3 mt-5 md:mt-0">
                    <a href="#"
                    class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                    Candidatos
                    </a>

                    <a href="{{ route('vacantes.edit', $vacante->id) }}"
                    class="bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                    Editar
                    </a>
                    {{-- wire:click => Hace referencia al Evento "click" --}}
                    {{-- $emit('') => Permite indicar que función queremos ejecutar cuando se cumpla el evento
                            1er Parametro => El 1er parametro que recibe es el nombre de la función definido en el controlador del componente (en el PHP) o en el apartado de scripts (en el JS) --}}
                    {{--    2do Parametro => Como 2do parametro recibe una variable con valores para procesarlos desde el contolador del componente (en el PHP) o en el apartado de scripts (en el JS) --}}
                    <button
                        wire:click="$emit('mostrarAlerta', {{ $vacante->id }})"
                        class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                        Eliminar
                    </button>
                </div>
            </div>
        @empty
            <p class="p-3 text-center text-sm text-gray-600">No hay vacantes que mostrar</p>
        @endforelse
    </div>

    <div class="mt-10">
        {{ $vacantes->links() }}
    </div>

</div>

{{--
    @push('scripts') => Directiva que agrega todo el contenido en el espacio que se reservó con la directiva  @stack('scripts').
        Parametro => Acepta como parametro el nombre del espacio reservado.
        Por ejemplo, en este caso se reservó agregando "@stack('scripts')", por lo tanto hacemos referencia a ese espeacio reservado con "@push('scripts')"
--}}
@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>

        // Livewire.on () => Permite Escuchar eventos en JavaScript, es decir, en este caso estará escuchando
        // si se ejecuta el evento "Click" (que se agregó con "wire:click="$emit('mostrarAlerta', {{ $vacante->id }})"").
        // Si se ejecuta el evento, mostrará la Alerta.
        // De esta manera podemos ejecutar una acción en el Front luego de que se ejecute un evento.
        //      1er Parametro => Nombre de la función, es decir en este caso se agregó "$emit('mostrarAlerta', {{ $vacante->id }})", por lo tanto el evento "Click"
        //                      Ejecutará la función "mostrarAlerta" en donde le pasamos el ID de la Vacante como parametro
        //      2do Parametro => Función (o callback) que se ejecutará al cumplirse el evento
        Livewire.on('mostrarAlerta', vacanteId => {
            Swal.fire({
            title: '¿Eliminar Vacante?',
            text: "Una vacante eliminado no se puede recuperar",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, ¡Eliminar!',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                // Eliminar la vacante
                // Ejecuta el método "eliminarVacante()" en el PHP del componente
                // De esta manera desde JS ejecutamos una función en PHP de una manera facil
                Livewire.emit('eliminarVacante', vacanteId);

                Swal.fire(
                '¡Vacante Eliminada!',
                'Se eliminó la vacante correctamente',
                'success'
                )
            }
            });
        });


    </script>
@endpush
