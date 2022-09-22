<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        VerifyEmail::toMailUsing(function($notifiable, $url){
            return (new MailMessage)
                // Titulo
                ->subject('Verificar Cuenta')
                // Saludo del Inicio
                ->greeting('¡Hola!')
				// Linea de Texto
                ->line('Tu Cuenta ya esta casi lista, solo debes presionar el enlace a continuación')
                // Botón de redirección
                ->action('Confirmar Cuenta', $url)
                // Linea de Texto
                ->line('Si no creaste esta cuenta, puedes ignorar este mensaje')
                // Despedida
				->salutation('¡Chau!');
        });
    }
}
