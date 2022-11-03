<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4">Postularme a esta vacante</h3>

    <form class="w-96 mt-5">
        <div class="mb-4">
            <x-input-label for="cv" :value="__('Curriculum u Hoja de Vida (PDF)')" />
            {{-- accept=".pdf" => Indicamos que solo se podrá subír archivos de tipo ".pdf" --}}
            <x-text-input id="cv" type="file" accept=".pdf" class="block mt-1 w-full"/>
        </div>

        {{-- Se pueden agregar clases a los componentenes en donde estos sobreescribiran los estilos por defectos del componente --}}
        <x-primary-button class="my-5">
            {{-- __('Algun texto') => Lo que se encuentre dentro de los guiones y parentecis como en el ejemplo, quiere decir que se puede traducir --}}
            {{ __('Postularme') }}
        </x-primary-button>
    </form>

</div>
