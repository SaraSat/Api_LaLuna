<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{
    public $successStatus = 200;
    /**
    * login api
    *
    * @return \Illuminate\Http\Response
    */
    public function login(Request $request)
    {
        $validator =[
            'email' => 'required|email',
            'password' => 'required',
            ];

        $messages=[
            'email.required' => 'El email es obligatorio',
            'email.email'=>'Email no válido',
            'password.required' => 'La contraseña es obligatoria'
        ];

        $v=Validator::make($request->all(), $validator, $messages);

        if($v->fails()){
            return response()->json(['error'=>$v->errors()],401);
        }

        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
    
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')-> accessToken;

            return response()->json(['success' => $success], $this-> successStatus);
        } 
        else{
            return response()->json(['error'=>['Constraseña o usuario incorrectos']], 401);
        }
    }
    /**
    * Register api
    *
    * @return \Illuminate\Http\Response
    */
    public function register(Request $request)
    {
        $validator = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'c_password' => 'required|same:password',
            ];

        $messages=[
            'name.required' => 'El nombre el obligatorio',
            'email.required' => 'El email es obligatorio',
            'email.email'=>'Email no válido',
            'email.unique' => 'Email duplicado',
            'password.required' => 'La contraseña es obligatoria',
            'password.min'=>'La contraseña debe tener al menos 8 dígitos',
            'c_password.required' => 'Contraseña obligatoria',
            'c_password.same'=>'Las constraseñas no coninciden',
        ];

        $v=Validator::make($request->all(), $validator, $messages);

        if($v->fails()){
            
            return response()->json(['error'=>$v->errors()],401);

        }else{

            $input = $request->all();

            $input['password'] = bcrypt($input['password']);

            $user = User::create($input);

            $success['token'] =  $user->createToken('MyApp')-> accessToken;

            $success['name'] =  $user->name;



            return response()->json(['success'=>$success], $this-> successStatus);

        }
    
           
    }

    public function logout(Request $request){
        Auth::logoutOtherDevices($request);
        return response()->json('Okk');
    }

    /**
    * details api
    *
    * @return \Illuminate\Http\Response
    */
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this-> successStatus);
    }
}
