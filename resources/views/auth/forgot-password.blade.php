<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('¿Olvidaste tu contraseña? coloca tu email de registro y te enviaremos un enlace para que puedas crear uno nuevo.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex justify-between mt-5 mb-4">
                <x-link
                    :href="route('login')"
                >
                    Iniciar Sesión
                </x-link>

                <x-link
                    :href="route('register')"
                >
                    Crear Cuenta
                </x-link>

            </div>

            {{-- Se pueden agregar clases a los componentenes en donde estos sobreescribiran los estilos por defectos del componente --}}
            <x-primary-button class="w-full justify-center">
                {{-- __('Algun texto') => Lo que se encuentre dentro de los guiones y parentecis como en el ejemplo, quiere decir que se puede traducir --}}
                {{ __('Enviar Instrucciones') }}
            </x-primary-button>
        </form>
    </x-auth-card>
</x-guest-layout>
