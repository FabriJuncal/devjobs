<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        @forelse ($vacantes as $vacante)
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="md:flex md:justify-between md:items-center py-5 px-8">
                <div class="md:flex-1">
                    <a href="{{ route('vacantes.show', $vacante->id) }}" class="text-3xl font-extrabold text-gray-600">
                        {{ $vacante->titulo }}
                    </a>
                    <p class="font-bold text-xs text-gray-600">
                        {{ $vacante->empresa }}
                    </p>
                    <p class="font-bold text-xs text-gray-600">
                        Último día para postularse:
                        <span class="font-normal"> {{$vacante->ultimo_dia->format('d/m/Y')}} </span>

                    </p>
                </div>

                <div class="mt-5 md:mt-0">
                    <a href="{{ route('vacantes.show', $vacante->id) }}"
                        class="bg-indigo-500 p-3 text-sm uppercase font-bold text-white rounded-lg block text-center">
                        Ver Vacantes
                    </a>
                </div>
            </div>

        </div>
        @empty
            <p class="p-3 text-center text-sm text-gray-600">No hay vacantes aún</p>
        @endforelse
    </div>
</div>
