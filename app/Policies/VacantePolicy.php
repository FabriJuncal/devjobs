<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vacante;
use Illuminate\Auth\Access\HandlesAuthorization;

class VacantePolicy
{
    use HandlesAuthorization;

    /**
     * Determinar si el usuario puede ver algún modelo.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    // Cuanto el método como en este caso no hace referencia a la Instancia, se le pasa el modelo completo
    // como en el caso de la siguiente linea de código:
    // Linea: 24
    // Archivo: app\Http\Controllers\VacanteController.php
    public function viewAny(User $user)
    {
        // Definimos que solo aquel usuario con el Rol nro 2 puede ver el modelo
        return $user->rol === 2;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Vacante $vacante)
    {
        //
    }

    /**
     * Determinar si el usuario puede crear modelos.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    // Cuanto el método como en este caso no hace referencia a la Instancia, se le pasa el modelo completo
    // como en el caso de la siguiente linea de código:
    // Linea: 42
    // Archivo: app\Http\Controllers\VacanteController.php
    public function create(User $user)
    {
        // Definimos que solo aquel usuario con el Rol nro 2 puede hacer un Insert
        return $user->rol === 2;
    }

    /**
     * Determinar si el usuario puede actualizar el modelo.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Vacante $vacante)
    {
        // Con el método "update" del Policity indicamos que solo el Usuario que Creó la vacante puede Actualizarla
        return $user->id === $vacante->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Vacante $vacante)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Vacante $vacante)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Vacante  $vacante
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Vacante $vacante)
    {
        //
    }
}
