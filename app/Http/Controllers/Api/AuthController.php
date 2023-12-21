<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\ResetPasswordNoty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function registro(Request $request) {
        $request->validate([
            'apellidos'=>['required', 'string', 'max:255'],
            'nombres' => ['required', 'string', 'max:255'],
            'identificacion' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'string', 'max:255'],
            'direccion' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->email,
            'email' => $request->email,
            'apellidos'=>$request->apellidos,
            'nombres'=>$request->nombres,
            'identificacion'=>$request->identificacion,
            'telefono'=>$request->telefono,
            'direccion'=>$request->direccion,
            'password' => Hash::make($request->password),
        ]);
    
        return response()->json([
            'message'=>'ok',
            'user'=>[
                'id'=>$user->id,
                'name'=>$user->apellidos.' '.$user->nombres,
                'email'=>$user->email,
                'identificacion'=>$user->identificacion,
                'celular'=>$user->celular,
                'direccion'=>$user->direccion,
                'perfil'=>$user->perfil
            ],
            'roles_permisos'=> [$user->perfil],
            'token'=>$user->createToken($request->email)->plainTextToken
        ]);
    }


    public function login(Request $request)
    {   
        $request->validate([
            'email' => 'required|email|string|max:255',
            'password' => 'required|min:8|string|max:255'
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            return response()->json([
                'message'=>'ok',
                'user'=>[
                    'id'=>$user->id,
                    'name'=>$user->apellidos.' '.$user->nombres,
                    'email'=>$user->email,
                    'identificacion'=>$user->identificacion,
                    'celular'=>$user->celular,
                    'direccion'=>$user->direccion,
                    'perfil'=>$user->perfil
                ],
                'roles_permisos'=> [$user->perfil],
                'token'=>$user->createToken($request->email)->plainTextToken
            ]);
        }else{
            throw ValidationException::withMessages([
                'email' => ['Las credenciales proporcionadas son incorrectas.'],
            ]);
        }
    }


    public function resetPassword(Request $request)
    {
        
        $request->validate([
            'email'=>'required|exists:users,email'
        ]);
        try {
            DB::beginTransaction();
            $user=User::where('email',$request->email)->first();
            $password=Str::random(8);
            $user->password=Hash::make($password);
            $user->save();
            $data = array('password'=> $password);
            $user->notify(new ResetPasswordNoty($data));
            DB::commit();
            return response()->json([
                'estado'=>'ok',
                'mensaje'=>'Se envió información al correo '.$request->email.' para restablecer la contraseña',
            ]);
            
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'estado'=>'ok',
                'mensaje'=>'Ocurrio un error. Contacte con administrador',
            ]);
        }
    }
}
