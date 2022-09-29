<form action="" class="md:w-1/2 space-y-5">
    <!-- Titulo Vacante -->
    <div>
        <x-input-label for="titulo" :value="__('Titulo Vacante')" />
        {{-- wire:model => Suplanta al atributo "name" y sirve para sincronizar con los atributos directamente del backend mediante Livewire --}}
        <x-text-input id="titulo" class="block mt-1 w-full" type="text" wire:model="titulo" :value="old('titulo')" placeholder="Titulo Vacante" />
    </div>

    <!-- Salario Mensual -->
    <div>
        <x-input-label for="salario" :value="__('Salario Mensual')" />
        {{-- wire:model => Suplanta al atributo "name" y sirve para sincronizar con los atributos directamente del backend mediante Livewire --}}
        <select wire:model="salario" id="salario" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">

            <option>-- Seleccione --</option>
            @foreach ($salarios as $salario)
                <option value="{{ $salario->id }}">{{ $salario->salario }}</option>
            @endforeach
        </select>
    </div>

    <!-- Categoría -->
    <div>
        <x-input-label for="categoria" :value="__('Categoría')" />
        {{-- wire:model => Suplanta al atributo "name" y sirve para sincronizar con los atributos directamente del backend mediante Livewire --}}
        <select wire:model="categoria" id="categoria" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
            <option>-- Seleccione --</option>
            @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
            @endforeach
        </select>
    </div>

    <!-- Empresa -->
    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />
        {{-- wire:model => Suplanta al atributo "name" y sirve para sincronizar con los atributos directamente del backend mediante Livewire --}}
        <x-text-input id="empresa" class="block mt-1 w-full" type="text" wire:model="empresa" :value="old('empresa')" placeholder="Empresa: ej. Netflix, Uber, Shopify"/>
    </div>

    <!-- Último Día para postularse -->
    <div>
        <x-input-label for="ultimo_dia" :value="__('Último Día para postularse')" />
        {{-- wire:model => Suplanta al atributo "name" y sirve para sincronizar con los atributos directamente del backend mediante Livewire --}}
        <x-text-input id="ultimo_dia" class="block mt-1 w-full" type="date" wire:model="ultimo_dia" :value="old('ultimo_dia')"/>
    </div>

    <!-- Último Día para postularse -->
    <div>
        <x-input-label for="descripcion" :value="__('Descripción Puesto')" />
        {{-- wire:model => Suplanta al atributo "name" y sirve para sincronizar con los atributos directamente del backend mediante Livewire --}}
        <textarea id="descripcion" wire:model="descripcion" placeholder="Descripción general del puesto, experiencia"  class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full h-72" />
        </textarea>
    </div>

    <!-- Imagen -->
    <div>
        <x-input-label for="imagen" :value="__('imagen')" />
        {{-- wire:model => Suplanta al atributo "name" y sirve para sincronizar con los atributos directamente del backend mediante Livewire --}}
        <x-text-input id="imagen" class="block mt-1" type="file" wire:model="imagen"/>
    </div>

    {{-- Se pueden agregar clases a los componentenes en donde estos sobreescribiran los estilos por defectos del componente --}}
    <x-primary-button class="justify-center">
        {{-- __('Algun texto') => Lo que se encuentre dentro de los guiones y parentecis como en el ejemplo, quiere decir que se puede traducir --}}
        {{ __('Crear Vacante') }}
    </x-primary-button>

</form>
