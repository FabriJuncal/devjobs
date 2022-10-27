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

</div>
