<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoCandidato extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($id_vacante, $nombre_vacante, $usuario_id)
    {
        //Definimos los Atributos que se utilizarán en la clase
        $this->id_vacante = $id_vacante;
        $this->nombre_vacante = $nombre_vacante;
        $this->usuario_id = $usuario_id;
    }

    /**
     * Obtener los canales de entrega de la notificación.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        // Indicamos que las vías que se utilizarán para las Notificaciones serán por "Mails" y "Base de Datos".
        // Es decir, en el array se indican que métodos se ejecutarán cuando se ejecute la función "->notify([INSTANCIA DE LA NOTIFICACIÓN])
        // y se le pase como parametro la instancia de la Notificación creada.
        return ['mail', 'database'];
    }

    /**
     * Obtener la representación por correo de la notificación.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */

    //  Método que viene ya definido en Laravel y se utiliza para el envio de Mails
    public function toMail($notifiable)
    {
        // Creamos la URL que redireccionará el botón del Mail
        $url = url('/notificaciones');

        return (new MailMessage)
                    // Titulo
                    ->subject('Postulación a la vacante "' . $this->nombre_vacante . '"')
                    // Saludo del Inicio
                    ->greeting('¡Hola!')
                    // Linea de Texto
                    ->line('Has recibido un nuevo candidato en tu vacante.')
                    ->line('La vacante es: ' . $this->nombre_vacante)
                    // Botón de redirección
                    ->action('Ver Notificaciones',  $url)
                    // Despedida
                    ->salutation('Gracias por utilizar DebJobs');
    }

    // Método que viene ya definido en Laravel y se utiliza para Almacenar la Notificación en la Base de Datos
    public function toDatabase($notifiable)
    {
        // Campos que se almacenarán en la Base de Datos en formato JSON
        // Tabla en que se almacenan => "notifications"
        // Campo en que se almacenan => "data"
        return [
            'id_vacante' => $this->id_vacante,
            'nombre_vacante' => $this->nombre_vacante,
            'usuario_id' => $this->usuario_id
        ];
    }

    /**
     * Obtener la representación de matriz de la notificación.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
