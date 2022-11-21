<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Candidatos de la Vacante') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <h1 class="text-2x1 font-bold text-center mb-10">
                        Vacante: {{ $vacante->titulo }}
                    </h1>

                    <div class="p-5">
                        <ul class="divide-y divide-gray-200">
                            @forelse ($vacante->candidatos as $candidato)
                                <li class="p-3 md:flex md:justify-between md:items-center">
                                    <div class="flex-1 w-full">
                                        <p class="text-xl font-medium text-gray-800">{{ $candidato->user->name }}</p>
                                        <p class="text-sm text-gray-600">{{ $candidato->user->email }}</p>
                                        <p class="text-sm font-medium text-gray-600">
                                            Día que se postuló:
                                            <span class="font-normal">{{ $candidato->created_at->diffForHumans() }}</span>
                                        </p>
                                    </div>

                                    <div class="mt-5 md:mt-0">
                                        <a  class="items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50 block text-center"
                                            target="_blank"
                                            rel="noreferrer noopener"  {{-- => Se utiliza por una cuestión de seguridad. Esto evita pasar nuestra información personal a la nueva pestaña a la que nos dirigimos --}}
                                            href="{{ asset('storage/cv/' . $candidato->cv) }}">
                                            Ver CV
                                        </a>
                                    </div>
                                </li>
                                {{-- Forma de ver datos de la asociación de modelos en formato array --}}
                                {{--
                                <pre>
                                    {{ $candidato->user }}
                                </pre>block
                                 --}}
                            @empty
                                <p class="p-3 text-center text-sm text-gray-600">
                                    No hay candidatos aún
                                </p>
                            @endforelse
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
