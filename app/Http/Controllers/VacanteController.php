<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use Illuminate\Http\Request;

class VacanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Valida a quien mostrar el modelo y a quien no, en este caso debe mostrar el modelo si tiene el rol de  Reclutador,
        // y no mostrarlo si el usuario tiene el rol de Desarrollador

        // $this->authorize('viewAny') => Hace referencia al método del policy que se encuentra en la siguiente ubicación "app\Policies\VacantePolicy.php"
        //      1er Parametro => Nombre del método del Policy (Por lo general los nombres son acciones)
        //      2do Parametro => Dependiendo el método del policy, este va a solicitar la Instancía del Modelo o el Modelo como en este caso.
        //                       Ya que si se ve el método, este no lo autodefine como en el caso del método del Policy llamado"update"
        $this->authorize('viewAny', Vacante::class);
        return view('vacantes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('vacantes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Vacante $vacante)
    {
        return view('vacantes.show', [
            'vacante' => $vacante
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacante $vacante)
    {
        // $this->authorize() =>  this->authorize('viewAny') => Hace referencia al método del policy que se encuentra en la siguiente ubicación "app\Policies\VacantePolicy.php".
        //      1er Parametro => Nombre del método del Policy (Por lo general los nombres son acciones)
        //      2do Parametro => Dependiendo el método del policy, este va a solicitar la Instancía del Modelo o el Modelo.
        //                       En este caso el método del policy solicita la Instancia del modelo.
        $this->authorize('update', $vacante);

        return view('vacantes.edit', [
            'vacante' => $vacante
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
