<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $vacante->titulo }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{-- Llamamos al componente creado con Livewire y le pasamos la instancia del modelo con :vacante="$vacante" --}}
                <livewire:mostrar-vacante
                    :vacante="$vacante"
                />
            </div>
        </div>
    </div>
</x-app-layout>
