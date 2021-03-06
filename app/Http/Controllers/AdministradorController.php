<?php

namespace App\Http\Controllers;

use App\administrador;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;



class AdministradorController extends Controller
{
    public $successStatus = 200;
   

    public function admin(Request $request)

    {
       if (Auth::guard('administrador')->attempt(['user_id'=>1, 'password' => $request['password']])) {
            $user = Auth::guard('administrador')->user();
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            return response()->json(['success' => $success], $this-> successStatus);
        } else {
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }
    /**
    * Register api
    *
    * @return \Illuminate\Http\Response
    */
    public function registerAdmin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'password' => 'required',
            ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
            $input = $request->all();
            $input['password'] = bcrypt($input['password']);
            $user = administrador::create($input);
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            $success['user_id'] =  $user->user_id;
            return response()->json(['success'=>$success], $this-> successStatus);
    }
    /**
    * details api
    *
    * @return \Illuminate\Http\Response
    */
    public function details()
    {
        $user = Auth::guard('administrador')->user();
        return response()->json(['success' => $user], $this-> successStatus);
    }
}
