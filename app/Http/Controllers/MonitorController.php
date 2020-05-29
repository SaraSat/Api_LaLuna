<?php

namespace App\Http\Controllers;

use App\monitor;
use Illuminate\Http\Request;

class MonitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()  //usa el metodo get 
    {
        $monitor = monitor::all();
        return $monitor;
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
             $monitor = monitor::create($request->all());
             return $monitor;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\monitor  $monitor
     * @return \Illuminate\Http\Response
     */
    public function show(monitor $monitor)
    {
        //este es para mostrar un monitor en concreto
        $monitor=$monitor::find($monitor->id);
         return $monitor;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\monitor  $monitor
     * @return \Illuminate\Http\Response
     */
    public function edit(monitor $monitor)
    {
         //para las apis no se utiliza
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\monitor  $monitor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, monitor $monitor)
    {
        //es para actualizar los datos de la tabla (metodo put)
        // recibe una peticion y lo que hace es meterlo en la tabla

        $monitor->fill($request->all());
        $monitor->save();
        return $monitor;  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\monitor  $monitor
     * @return \Illuminate\Http\Response
     */
    public function destroy(monitor $monitor)
    {
        //metodo delete recibe una evaluacion y la borra

        $evaluacion->delete();
    }
}
