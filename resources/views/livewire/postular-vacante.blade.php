<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4">Postularme a esta vacante</h3>

    {{-- Obtenemos la variable almacenada en la session desde el PHP del componente --}}
    @if (session()->has('mensaje'))

        <p class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-5 text-sm rounded-lg">
            {{ session('mensaje') }}
        </p>

    @else

        <form wire:submit.prevent="postularme" class="w-96 mt-5">
            <div class="mb-4">
                <x-input-label for="cv" :value="__('Curriculum u Hoja de Vida (PDF)')" />
                {{-- accept=".pdf" => Indicamos que solo se podrá subír archivos de tipo ".pdf" --}}
                <x-text-input wire:model="cv" id="cv" type="file" accept=".pdf" class="block mt-1 w-full"/>
            </div>

            @error('cv')
                <livewire:mostrar-alerta :message="$message"/>
            @enderror

            {{-- Se pueden agregar clases a los componentenes en donde estos sobreescribiran los estilos por defectos del componente --}}
            <x-primary-button class="my-5">
                {{-- __('Algun texto') => Lo que se encuentre dentro de los guiones y parentecis como en el ejemplo, quiere decir que se puede traducir --}}
                {{ __('Postularme') }}
            </x-primary-button>
        </form>

    @endif


</div>
