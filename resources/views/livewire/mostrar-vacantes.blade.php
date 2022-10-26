<div>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        {{-- @forelse => Es una mescla entre un "foreach" y un "if", lo que hace es iterar sobre el array si este contiene registros, y si este no contiene registros ejecuta el código del "@empty"--}}
        @forelse ($vacantes as $vacante )
            <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
                <div class="leading-10">
                    <a href="#" class="text-xl font-bold">
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
                        wire:click="$emit('prueba', {{ $vacante->id }})"
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

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>

        Livewire.on('prueba', vacanteId => {
            alert('Desde el Código de JS => ID nro: ' + vacanteId);
        });

        // Swal.fire({
        // title: '¿Eliminar Vacante?',
        // text: "Una vacante eliminado no se puede recuperar",
        // icon: 'warning',
        // showCancelButton: true,
        // confirmButtonColor: '#3085d6',
        // cancelButtonColor: '#d33',
        // confirmButtonText: 'Si, ¡Eliminar!',
        // cancelButtonText: 'Cancelar'
        // }).then((result) => {
        // if (result.isConfirmed) {
        //     Swal.fire(
        //     '¡Vacante Eliminada!',
        //     'Se eliminó la vacante',
        //     'success'
        //     )
        // }
        // })
    </script>
@endpush
