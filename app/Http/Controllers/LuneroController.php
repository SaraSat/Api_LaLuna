<?php

namespace App\Http\Controllers;

use App\lunero;
use Illuminate\Http\Request;

class LuneroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lunero= lunero::all();
        return $lunero;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          //este es el metodo post para insertar una nueva evaluacion
          $lunero = lunero::create($request->all());
          return $lunero;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\lunero  $lunero
     * @return \Illuminate\Http\Response
     */
    public function show(lunero $lunero)
    {
        //este es para mostrar una evaluacion en concreto
        $lunero=$lunero::find($lunero->id);
         return $lunero;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\lunero  $lunero
     * @return \Illuminate\Http\Response
     */
    public function edit(lunero $lunero)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\lunero  $lunero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lunero $lunero)
    {
           //es para actualizar los datos de la tabla (metodo put)
        // recibe una peticion y lo que hace es meterlo en la tabla

        $lunero->fill($request->all());
        $lunero->save();
        return $lunero;   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\lunero  $lunero
     * @return \Illuminate\Http\Response
     */
    public function destroy(lunero $lunero)
    {
        //metodo delete recibe una evaluacion y la borra

        $lunero->delete();
    }
}
