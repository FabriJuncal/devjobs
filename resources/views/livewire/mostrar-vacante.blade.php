<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-800 my-3">
            {{ $vacante->titulo }}
        </h3>
    </div>

    <div class="md:grid md:grid-cols-2 bg-gray-50 p-4 my-10">
        <p class="font-bold text-sm uppercase text-gray-800 my-3">Empresa:
            {{--
                $vacante => Instancia del modelo
                $vacante->empresa => Hace referencia al campo "empresa" de la tabla "vacantes"
            --}}
            <span class="normal-case font-normal">{{ $vacante->empresa }}</span>
        </p>

        <p class="font-bold text-sm uppercase text-gray-800 my-3">Último día para postularse:
            {{--
                $vacante => Instancia del modelo
                $vacante->ultimo_dia => Hace referencia al campo "ultimo_dia" de la tabla "vacantes"
                toFormattedDateString() => Formatea la fecha a y queda algo como "21 de abril de 2015"
            --}}
            <span class="normal-case font-normal">{{ $vacante->ultimo_dia->toFormattedDateString() }}</span>
        </p>

        <p class="font-bold text-sm uppercase text-gray-800 my-3"> Categoría:
            {{--
                $vacante => Instancia del modelo
                $vacante->categoria => Hace referencia a la relación de "Uno a Muchos" establecido en el Modelo de "Vacante", es decír,
                                        que estaría haciendo un "INNER JOIN" entre las tablas "Vacantes" y "Categorias".
                $vacante->categoria->categoria => Hace referencia al campo "categoria" de la relación entre las tablas "Vacantes" y "Categorias"
            --}}
            <span class="normal-case font-normal">{{ $vacante->categoria->categoria }}</span>
        </p>

        <p class="font-bold text-sm uppercase text-gray-800 my-3"> Empresa:
            {{--
                $vacante => Instancia del modelo
                $vacante->categoria => Hace referencia a la relación de "Uno a Muchos" establecido en el Modelo de "Vacante", es decír,
                                        que estaría haciendo un "INNER JOIN" entre las tablas "Vacantes" y "Salarios".
                $vacante->categoria->categoria => Hace referencia al campo "salario" de la relación entre las tablas "Vacantes" y "Salarios"
            --}}
            <span class="normal-case font-normal">{{ $vacante->salario->salario }}</span>
        </p>
    </div>

    <div class="md:grid md:grid-cols-6 gap-4">
        <div class="md:col-span-2">
            <img src="{{ asset('storage/vacantes/' . $vacante->imagen) }}" alt="{{ "Imagen vacante " . $vacante->titulo }}">
        </div>
        <div class="md:col-span-4">
            <h2 class="text-2xl font-bold mb-5">
                Descripción del Puesto
            </h2>
            <p>{{ $vacante->descripcion }}</p>
        </div>
    </div>

    {{-- Se muestra solo si el usuario no esta Logeado --}}
    @guest
        <div class="mt-5 bg-gray-50 border border-dashed p-5 text-center">
            <p>
                ¿Deseas aplicar a esta vacante?
                <a href="{{ route('register') }}" class="font-bold text-indigo-600">
                    Obten una cuenta y aplica a esta y otras vacantes
                </a>
            </p>
        </div>
    @endguest

    @auth
        {{-- No se muestra si el usuario no cumple con la lógica del Policy de la ruta: --}}
        {{-- Linea: 54 --}}
        {{-- Archivo: app\Policies\VacantePolicy.php --}}

        {{-- @cannot('[NOMBRE DEL MÉTODO DEL POLICY]', [RUTA DEL MODELO]) => Directiva de Laravel que ejecuta el código dentro solos si el la condición del Policy no se cumple.
                                                                            Tambien existe la directiva opesta a esta, que es "@can()"--}}
        {{-- 1er Parametro => Nombre del método del Policy --}}
        {{-- 2do Parametro => Ruta del Modelo (De otra forma no funcionará) --}}
        @cannot('create', App\Models\Vacante::class)
            <livewire:postular-vacante :vacante="$vacante"/>
        @endcannot
    @endauth


</div>
