<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reserva;
use App\Models\Servicio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InicioController extends Controller
{
    public function listadoReservas() {

        $data=Servicio::where('estado','ACTIVO')->latest()->get()->map(function($servicio){
            return [
                'id'=>$servicio->id,
                'nombre'=>$servicio->nombre,
                'detalle'=>$servicio->detalle,
                'estado'=>$servicio->estado,
                'capacidad_personas'=>$servicio->capacidad_personas,
                'dimensiones'=>$servicio->dimensiones,
                'precio_hora'=>$servicio->precio_hora,
                'foto_1'=>asset(Storage::url($servicio->foto_1)),
                'foto_2'=>asset(Storage::url($servicio->foto_2)),
                'foto_3'=>asset(Storage::url($servicio->foto_3)),
                'foto_4'=>asset(Storage::url($servicio->foto_4)),
                'tipo_reserva'=>$servicio->tipoReserva->nombre,
            ];
        });
        return json_encode(['servicios'=>$data]);
    }

    public function obtenerUsuario(Request $request)  {
        $user=User::find($request->userId);
        return json_encode(
            [
                'email'=>$user->email,
                'apellidos'=>$user->apellidos,
                'nombres'=>$user->nombres,
                'identificacion'=>$user->identificacion,
                'telefono'=>$user->telefono,
                'direccion'=>$user->direccion,
            ]
        );
    }
}
