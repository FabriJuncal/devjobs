<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // __invoke => Este Método Especial se utiliza cuando el Controllador será de un unico Método
    public function __invoke(Request $request)
    {
        // ->unreadNoitications => Este método mostrará las notificaciones no leídas del usuario logeado
        $notificaciones = auth()->user()->unreadNotifications;

        // Limpia las Notificaciones unas ves vistas
        auth()->user()->unreadNotifications->markAsRead();

        return view('notificaciones.index', [
            'notificaciones' =>$notificaciones
        ]);
    }
}
