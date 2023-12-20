<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = array(
            'usuarios'=>User::latest()->get()
        );

        return view('usuarios.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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

        return redirect()->route('usuarios.index')->with('success','USUARIO INGRESADO EXITOSAMENTE');
    }

    /**
     * Display the specified resource.
     */
    public function show($userId)
    {
        $user=User::findOrFail($userId);
        $data = array(
            'user'=>$user
        );
        return view('usuarios.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($userId)
    {
        $user=User::findOrFail($userId);
        $data = array(
            'user'=>$user
        );
        return view('usuarios.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $userId)
    {
        $user=User::findOrFail($userId);
        $user->update($request->all());
        return redirect()->route('usuarios.index')->with('success','USUARIO ACTUALIZADO EXITOSAMENTE');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($userId)
    {
        $user=User::findOrFail($userId);
        
        try {
            $user->delete();
            return redirect()->route('usuarios.index')->with('success','USUARIO ELIMINADO EXITOSAMENTE');
        } catch (\Throwable $th) {
            
            return redirect()->route('usuarios.index')->with('info','USUARIO NO ELIMINADO YA QUE CONTIENE INFORMACIÓN RELACIONADO CON OTROS MODULOS DEL SISTEMA');
        }
    }
}
