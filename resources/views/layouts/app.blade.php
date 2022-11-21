<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        {{-- Importamos los Estilos de Livewire --}}
        @livewireStyles
        {{-- Importamos los Estilos Personalizados --}}
        {{-- @stack('') => Directiva que sirve para reservar un espacio en el código en Laravel,
                        de esta forma reservamos este espacio para importar los estilos personalizados --}}
        {{-- Parametro => Recibe como parametro un valor string que puede ser cualquier nombre que luego se hará referencia
                        con la directiva "@push('')" --}}
        @stack('styles')
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            @if (isset($header))
                <!-- Page Heading -->
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        {{-- Importamos los Scripts de Livewire --}}
        @livewireScripts
        {{-- Importamos los Estilos Personalizados --}}
        {{-- @stack('') => Directiva que sirve para reservar un espacio en el código en Laravel,
                        de esta forma reservamos este espacio para importar los scripts personalizados.
            Parametro => Recibe como parametro un valor string que puede ser cualquier nombre que luego se hará referencia
                        con la directiva "@push('')"
        --}}
        @stack('scripts')
    </body>
</html>
