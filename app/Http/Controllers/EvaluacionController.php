<?php

namespace App\Http\Controllers;

use App\evaluacion;
use Illuminate\Http\Request;

class EvaluacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //usa el metodo get 
    {
        $evaluacion = evaluacion::all();
        return $evaluacion;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // este no se usa para las apis
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
        $evaluacion = evaluacion::create($request->all());
        return $evaluacion;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function show(evaluacion $evaluacion)
    {
        //este es para mostrar una evaluacion en concreto
        $evaluacion=$evaluacion::find($evaluacion->id);
         return $evaluacion;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function edit(evaluacion $evaluacion)
    {
        //para las apis no se utiliza
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, evaluacion $evaluacion)
    {
        //es para actualizar los datos de la tabla (metodo put)
        // recibe una peticion y lo que hace es meterlo en la tabla

        $evaluacion->fill($request->all());
        $evaluacion->save();
        return $evaluacion;   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\evaluacion  $evaluacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(evaluacion $evaluacion)
    {
        //metodo delete recibe una evaluacion y la borra

        $evaluacion->delete();
    }
}
