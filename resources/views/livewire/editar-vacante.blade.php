{{-- wire:submit.prevent => Le agrega la misma funcionalidad que el "Prevent Default" para quitar la acción por default del formulario.
                            Tambien de esta forma enviamos los datos de los campos a los atributos sincronizados en el backend mediante Livewire --}}
                            <form action="" class="md:w-1/2 space-y-5" wire:submit.prevent='crearVacante'>
                                <!-- Titulo Vacante -->
                                <div>
                                    <x-input-label for="titulo" :value="__('Titulo Vacante')" />
                                    {{-- wire:model => Suplanta al atributo "name" y sirve para sincronizar con los atributos directamente del backend mediante Livewire --}}
                                    <x-text-input id="titulo" class="block mt-1 w-full" type="text" wire:model="titulo" :value="old('titulo')" placeholder="Titulo Vacante" />

                                    {{-- @error('') => Acepta un parametro que debe ser el mismo que el valor que se agregó al atributo "wire:model" del campo --}}
                                    @error('titulo')
                                    {{-- Siempre los Componente de Livewiere deben seguír esta convención "<livewire:[nombre del componente]" /> --}}
                                    {{-- :message="$message" => De esta manera le pasamos un parametro al Componente --}}
                                        <livewire:mostrar-alerta :message="$message"/>
                                    @enderror
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

                                    {{-- @error('') => Acepta un parametro que debe ser el mismo que el valor que se agregó al atributo "wire:model" del campo --}}
                                    @error('salario')
                                    {{-- Siempre los Componente de Livewiere deben seguír esta convención "<livewire:[nombre del componente]" /> --}}
                                    {{-- :message="$message" => De esta manera le pasamos un parametro al Componente --}}
                                        <livewire:mostrar-alerta :message="$message"/>
                                    @enderror
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

                                    {{-- @error('') => Acepta un parametro que debe ser el mismo que el valor que se agregó al atributo "wire:model" del campo --}}
                                    @error('categoria')
                                    {{-- Siempre los Componente de Livewiere deben seguír esta convención "<livewire:[nombre del componente]" /> --}}
                                    {{-- :message="$message" => De esta manera le pasamos un parametro al Componente --}}
                                        <livewire:mostrar-alerta :message="$message"/>
                                    @enderror
                                </div>

                                <!-- Empresa -->
                                <div>
                                    <x-input-label for="empresa" :value="__('Empresa')" />
                                    {{-- wire:model => Suplanta al atributo "name" y sirve para sincronizar con los atributos directamente del backend mediante Livewire --}}
                                    <x-text-input id="empresa" class="block mt-1 w-full" type="text" wire:model="empresa" :value="old('empresa')" placeholder="Empresa: ej. Netflix, Uber, Shopify"/>

                                    {{-- @error('') => Acepta un parametro que debe ser el mismo que el valor que se agregó al atributo "wire:model" del campo --}}
                                    @error('empresa')
                                    {{-- Siempre los Componente de Livewiere deben seguír esta convención "<livewire:[nombre del componente]" /> --}}
                                    {{-- :message="$message" => De esta manera le pasamos un parametro al Componente --}}
                                        <livewire:mostrar-alerta :message="$message"/>
                                    @enderror
                                </div>

                                <!-- Último Día para postularse -->
                                <div>
                                    <x-input-label for="ultimo_dia" :value="__('Último Día para postularse')" />
                                    {{-- wire:model => Suplanta al atributo "name" y sirve para sincronizar con los atributos directamente del backend mediante Livewire --}}
                                    <x-text-input id="ultimo_dia" class="block mt-1 w-full" type="date" wire:model="ultimo_dia" :value="old('ultimo_dia')"/>

                                    {{-- @error('') => Acepta un parametro que debe ser el mismo que el valor que se agregó al atributo "wire:model" del campo --}}
                                    @error('ultimo_dia')
                                    {{-- Siempre los Componente de Livewiere deben seguír esta convención "<livewire:[nombre del componente]" /> --}}
                                    {{-- :message="$message" => De esta manera le pasamos un parametro al Componente --}}
                                        <livewire:mostrar-alerta :message="$message"/>
                                    @enderror
                                </div>

                                <!-- Último Día para postularse -->
                                <div>
                                    <x-input-label for="descripcion" :value="__('Descripción Puesto')" />
                                    {{-- wire:model => Suplanta al atributo "name" y sirve para sincronizar con los atributos directamente del backend mediante Livewire --}}
                                    <textarea id="descripcion" wire:model="descripcion" placeholder="Descripción general del puesto, experiencia"  class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full h-72" />
                                    </textarea>

                                    {{-- @error('') => Acepta un parametro que debe ser el mismo que el valor que se agregó al atributo "wire:model" del campo --}}
                                    @error('descripcion')
                                    {{-- Siempre los Componente de Livewiere deben seguír esta convención "<livewire:[nombre del componente]" /> --}}
                                    {{-- :message="$message" => De esta manera le pasamos un parametro al Componente --}}
                                        <livewire:mostrar-alerta :message="$message"/>
                                    @enderror
                                </div>

                                <!-- Imagen -->
                                <div>
                                    <x-input-label :value="__('imagen')" />
                                    {{-- wire:model => Suplanta al atributo "name" y sirve para sincronizar con los atributos directamente del backend mediante Livewire --}}
                                    <x-text-input
                                        id="imagen"
                                        class="block mt-1"
                                        type="file"
                                        wire:model="imagen"
                                        accept="image/*"/> {{-- Indicamos en el campo que solo se permitirá imagenes,
                                                                por lo tanto esto hará que a la hora de seleccionar un
                                                                archivo, solo se muestren las imagenes --}}

                                    <div class="my-5 w-80">
                                        @if ($imagen)
                                            Imagen Actual:
                                            {{-- En el atributo "src" llamos al atributo que contendrá la imagen
                                                (El atributo en este caso es "$imagen" y se lo puede encontrar definido en el archivo .php del componente).
                                                Luego llamos al método "temporaryUrl()" que almacena la imagen de manera temporal. --}}
                                            <img src="{{ asset('storage/vacantes/'. $imagen) }}" alt="Imagen Vacante $titulo">

                                        @endif
                                    </div>

                                    {{-- @error('') => Acepta un parametro que debe ser el mismo que el valor que se agregó al atributo "wire:model" del campo --}}
                                    @error('imagen')
                                    {{-- Siempre los Componente de Livewiere deben seguír esta convención "<livewire:[nombre del componente]" /> --}}
                                    {{-- :message="$message" => De esta manera le pasamos un parametro al Componente --}}
                                        <livewire:mostrar-alerta :message="$message"/>
                                    @enderror
                                </div>

                                {{-- Se pueden agregar clases a los componentenes en donde estos sobreescribiran los estilos por defectos del componente --}}
                                <x-primary-button class="justify-center">
                                    {{-- __('Algun texto') => Lo que se encuentre dentro de los guiones y parentecis como en el ejemplo, quiere decir que se puede traducir --}}
                                    {{ __('Crear Vacante') }}
                                </x-primary-button>

                            </form>
