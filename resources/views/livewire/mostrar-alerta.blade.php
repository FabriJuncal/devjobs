{{-- Los Componentes siempre deben tener un <div> como etiqueta HTML padre --}}
<div class="border border-red-500 bg-red-100 text-red-700 font-bold uppercase p-2 mt-2 text-xs">
    {{-- Esta variable esta sincronizada al atributo con el mismo nombre en el backend del componente --}}
    {{ $message }}
</div>
