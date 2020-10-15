<?php

namespace App\Http\Controllers;

use App\lunero;
use Illuminate\Http\Request;
use Validator;

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
          //este es el metodo post para insertar un nuevo lunero+
        $validator = [
            'nombre' => 'required',
            'telf' => 'required|integer|digits_between:9,9',
            'telf2' => 'integer|digits_between:9,9',

            ];

        $messages=[
            'nombre.required' => 'El nombre es obligatorio',
            'telf.required' => 'El teléfono es obligatorio',
            'telf.integer' => 'El teléfono es de tipo numérico',
            'telf2.integer' => 'El teléfono es de tipo numérico',
            'telf.digits_between' => 'El teléfono debe tener 9 dígitos',
            'telf2.digits_between' => 'El teléfono debe tener 9 dígitos'

        ];

        $v=Validator::make($request->all(), $validator, $messages);

        if($v->fails()){
            
            return response()->json(['error'=>$v->errors()],401);

        }else{


            $lunero = lunero::create($request->all());
            return $lunero;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\lunero  $lunero
     * @return \Illuminate\Http\Response
     */
    public function show(lunero $lunero)
    {
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

        $validator = [
            'nombre' => 'required',
            'telf' => 'required|integer|digits_between:9,9',
            'telf2' => 'integer|digits_between:9,9',

            ];

        $messages=[
            'nombre.required' => 'El nombre es obligatorio',
            'telf.required' => 'El teléfono es obligatorio',
            'telf.integer' => 'El teléfono es de tipo numérico',
            'telf2.integer' => 'El teléfono es de tipo numérico',
            'telf.digits_between' => 'El teléfono debe tener 9 dígitos',
            'telf2.digits_between' => 'El teléfono debe tener 9 dígitos'

        ];
        $v=Validator::make($request->all(), $validator, $messages);

        if($v->fails()){
            
            return response()->json(['error'=>$v->errors()],401);

        }else{

            $lunero->fill($request->all());
            $lunero->save();
            return $lunero;   
        }
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
