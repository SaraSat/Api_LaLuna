<?php

namespace App\Http\Controllers;

use App\inicio;
use Illuminate\Http\Request;
use Validator;

class InicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inicio= inicio::all();
        return $inicio;
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
        $validator = [
            'lugar' => 'required',
            'fecha' => 'required',
            'desc' => 'required',
            'hora' => 'required',
            'precio' => 'required|integer',
            'horaF' => 'required',
            'lugarF' => 'required'

            ];

        $messages=[
            'lugar.required' => 'El lugar es obligatorio',
            'lugarF.required' => 'El lugar de finalización es obligatorio',
            'fecha.required' => 'La fecha es obligatoria',
            'hora.required' => 'La hora es obligatoria',
            'horaF.required' => 'La hora de finalización es obligatoria',
            'desc.required' => 'Debes introducir una breve descripción de la actividad',
            'precio.required' => 'El precio es obligatorio',
            'precio.integer' => 'El precio es de tipo numérico'
        ];

        $v=Validator::make($request->all(), $validator, $messages);

        if($v->fails()){
            
            return response()->json(['error'=>$v->errors()],401);

        }else{

            $actividad = inicio::create($request->all());
            return $actividad;

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\inicio  $inicio
     * @return \Illuminate\Http\Response
     */
    public function show(inicio $inicio)
    {
       $inicio=inicio::find($inicio->id);
        return $inicio;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\inicio  $inicio
     * @return \Illuminate\Http\Response
     */
    public function edit(inicio $inicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\inicio  $inicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, inicio $inicio)
    {

        $validator = [
            'lugar' => 'required',
            'fecha' => 'required',
            'desc' => 'required',
            'hora' => 'required',
            'precio' => 'required|integer',
            'horaF' => 'required',
            'lugarF' => 'required'

            ];

        $messages=[
            'lugar.required' => 'El lugar es obligatorio',
            'lugarF.required' => 'El lugar de finalización es obligatorio',
            'fecha.required' => 'La fecha es obligatoria',
            'hora.required' => 'La hora es obligatoria',
            'horaF.required' => 'La hora de finalización es obligatoria',
            'desc.required' => 'Debes introducir una breve descripción de la actividad',
            'precio.required' => 'El precio es obligatorio',
            'precio.integer' => 'El precio es de tipo numérico'
        ];

        $v=Validator::make($request->all(), $validator, $messages);

        if($v->fails()){
            
            return response()->json(['error'=>$v->errors()],401);

        }else{

        
            $inicio->fill($request->all());
            $inicio->save();

            return $inicio;  
        
        }
                
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\inicio  $inicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(inicio $inicio)
    {
        //
    }
}
