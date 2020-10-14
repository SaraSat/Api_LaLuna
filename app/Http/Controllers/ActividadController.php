<?php

namespace App\Http\Controllers;

use App\actividad;
use Illuminate\Http\Request;
use Validator;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actividad = actividad::all();
        return $actividad;
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
            'nombre' => 'required',
            'fecha' => 'required',
            'desc' => 'required',
            ];

        $messages=[
            'nombre.required' => 'El nombre es obligatorio',
            'fecha.required' => 'La fecha es obligatoria',
            'desc.required' => 'Debes introducir una breve descripción de la actividad',
        ];

        $v=Validator::make($request->all(), $validator, $messages);

        if($v->fails()){
            
            return response()->json(['error'=>$v->errors()],401);

        }else{
            
            $actividad = actividad::create($request->all());
            return $actividad;

        }

    

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function show(actividad $actividad)
    {
        $act=actividad::where('id',$actividad);
        return $act;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function edit(actividad $actividad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, actividad $actividad)
    {
        $validator = [
            'nombre' => 'required',
            'fecha' => 'required',
            'desc' => 'required',
            ];

        $messages=[
            'nombre.required' => 'El nombre es obligatorio',
            'fecha.required' => 'La fecha es obligatoria',
            'desc.required' => 'Debes introducir una breve descripción de la actividad',
        ];

        $v=Validator::make($request->all(), $validator, $messages);

        if($v->fails()){
            
            return response()->json(['error'=>$v->errors()],401);

        }else{

            $actividad->fill($request->all());
            $actividad->save();

            return $actividad;   
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function destroy(actividad $actividad)
    {
        $actividad->delete();
    }
}
