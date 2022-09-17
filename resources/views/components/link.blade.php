@php
    // Asignamos a una variable las clases de Talwind para el componente
    $classes = "text-xs text-gray-500 hover:text-gray-900"
@endphp

{{--
    $attributes => Toma las variables que le pasemos como parametro  en forma de Atributo cuando llamamos al componente
    $attributes->merge => Fusiona los atributos que le pasemos como parametro y los agrega al componente
    $attributes->merge(['class' => $classes]) => Indicamos que agregue los valores de la variable "$classes" dentro del atributo "class"

--}}
<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
