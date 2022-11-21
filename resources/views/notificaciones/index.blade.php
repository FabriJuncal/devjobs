<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notificaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <h1 class="text-2x1 font-bold text-center mb-10">Mis Notificaciones</h1>

                    <div class="divide-y divide-gray-200">
                        {{-- @forelse => Es una mescla entre un "foreach" y un "if", lo que hace es iterar sobre el array si este contiene registros, y si este no contiene registros ejecuta el código del "@empty"--}}
                        @forelse ($notificaciones as $notificacion )
                            <div class="p-5 md:flex md:justify-between md:items-center">
                                <div>
                                    <p>
                                        Tienes un nuevo candidato en:
                                        <span class="font-bold">{{ $notificacion->data['nombre_vacante'] }}</span>
                                    </p>
                                    <p>
                                        <span class="font-bold">{{ $notificacion->created_at->diffForHumans() }}</span>
                                    </p>
                                </div>
                                <div class="mt-5 md:mt-0">
                                    <a href="{{ route('candidatos.index', $notificacion->data['id_vacante']) }}" class="bg-indigo-600 p-3 text-sm uppercase font-bold text-white rounded-lg block text-center">
                                        Ver Candidatos
                                    </a>
                                </div>
                            </div>
                        @empty
                            <p class="p-3 text-center text-sm text-gray-600">No hay notificaciones nuevas que mostrar</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
