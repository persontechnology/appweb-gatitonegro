<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dato;
use App\Models\Reserva;
use App\Models\Servicio;
use App\Models\User;
use App\Notifications\EnviarReserva;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
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


    public function reservarServicio(Request $request) {
        $request->validate([
            'servicio_id'=>'required',
            'apellidos'=>'required',
            'nombres'=>'required',
            'identificacion'=>'required',
            'telefono'=>'required',
            'direccion'=>'required',
            'fecha_inicio'=>'required',
            'cantidad_horas'=>'required',
            'user_id'=>'required'
        ]);
        
        $user=User::find($request->user_id);
        $servicio=Servicio::findOrFail($request->servicio_id);
        $fecha_inicio=Carbon::parse($request->fecha_inicio);
        $fecha_final=$fecha_inicio->copy()->addHours($request->cantidad_horas);
        
       
        
        $reserva=Reserva::where(function($query) use($fecha_inicio,$fecha_final,$request){
            $query->where('fecha_final','>=',$fecha_inicio);
            $query->where('fecha_inicio','<=',$fecha_final);
            $query->where('servicio_id',$request->servicio_id);
        })->first();
    
        
        

        if(!$reserva){
            $reserva=new Reserva();
            $reserva->user_id=$user->id;
            $reserva->servicio_id=$request->servicio_id;
            $reserva->precio=$servicio->precio_hora;
            $reserva->fecha_inicio=$fecha_inicio;
            $reserva->fecha_final=$fecha_final;
            $reserva->cantidad_horas=$request->cantidad_horas;
            $reserva->detalle_cliente=$request->detalle;
            $reserva->save();

            // ACTUALIZAMOS DATOS DE CLIENTE
            
            $user->apellidos=$request->apellidos;
            $user->nombres=$request->nombres;
            $user->identificacion=$request->identificacion;
            $user->telefono=$request->telefono;
            $user->direccion=$request->direccion;
            $user->save();

            // ENVIAR NOTIFICACION CLIENTE Y ADMIN
            $users=User::where(function($query) use($user){
                $query->where('id',$user->id);
                $query->orWhere('perfil','ADMIN');
            })->get();

            Notification::send($users, new EnviarReserva($reserva));

            $msg='La presente reserva de '.$reserva->servicio->nombre.', ha sido enviada a su correo electrónico '.$reserva->user->email.'. Agradecemos su reserva y le recordamos que deberá
            acercarse al lugar con el recibo enviado a su correo para efectuar el pago el día de la reserva. La Secretaría se pondrá en contacto
            con usted a la brevedad posible para validar información y confirmar la reserva.';
            return json_encode([
                'message'=>'ok',
                'descripcion'=>$msg
            ]);
        }else{
            return json_encode([
                'message'=>'no',
                'descripcion'=>$servicio->nombre.' NO DISPONIBLE PARA LA FECHA '.$fecha_inicio.', POR FAVOR SELECCIONE OTRA FECHA.'
            ]);
        }
        
    }


    public function listarReservasSolicitados(){
        $data=Reserva::where('estado','SOLICITADO')->get()->map(function($reserva){
            $servicio=$reserva->servicio;
            return [
                'id'=>$reserva->id,
                'nombre'=>$servicio->nombre,
                'foto_1'=>asset(Storage::url($servicio->foto_1)),

                'cliente'=>($reserva->user->apellidos??'').' '.($reserva->user->nombres??'') ,
                'email'=>$reserva->user->email??'',
                'identificacion'=>$reserva->user->identificacion??'',
                'telefono'=>$reserva->user->telefono??'',
                'direccion'=>$reserva->user->direccion??'',

                'precio'=>$reserva->precio,
                'fecha_inicio'=>$reserva->fecha_inicio,
                'fecha_final'=>$reserva->fecha_final,
                'cantidad_horas'=>$reserva->cantidad_horas,
                'detalle_cliente'=>$reserva->detalle_cliente,
                'estado'=>$reserva->estado
            ];

        });

        return json_encode(['servicios'=>$data]);
    }

    public function listarMisReservas(Request $request){
        $user=User::find($request->userId);

        $data=$user->reservas->map(function($reserva){
            $servicio=$reserva->servicio;
            return [
                'id'=>$reserva->id,
                'nombre'=>$servicio->nombre,
                'foto_1'=>asset(Storage::url($servicio->foto_1)),

                'cliente'=>($reserva->user->apellidos??'').' '.($reserva->user->nombres??'') ,
                'email'=>$reserva->user->email??'',
                'identificacion'=>$reserva->user->identificacion??'',
                'telefono'=>$reserva->user->telefono??'',
                'direccion'=>$reserva->user->direccion??'',

                'precio'=>$reserva->precio,
                'fecha_inicio'=>$reserva->fecha_inicio,
                'fecha_final'=>$reserva->fecha_final,
                'cantidad_horas'=>$reserva->cantidad_horas,
                'detalle_cliente'=>$reserva->detalle_cliente,
                'estado'=>$reserva->estado
            ];

        });

        return json_encode(['servicios'=>$data]);
    }

    

    public function reservarRechazarReserva(Request $request) {
        $reserva=Reserva::find($request->id);
        $reserva->estado=$request->estado;
        $reserva->save();
        return json_encode([
            'message'=>'ok',
            'descripcion'=>$reserva->servicio->nombre.' '.$reserva->estado
        ]);
    }


    public function reservarEliminar(Request $request) {
        $reserva=Reserva::find($request->id);
        
        try {
            $reserva->delete();
            return json_encode([
                'message'=>'ok',
                'descripcion'=>$reserva->servicio->nombre.' eliminado.'
            ]);
        } catch (\Throwable $th) {
            return json_encode([
                'message'=>'no',
                'descripcion'=>$reserva->servicio->nombre.' no eliminado, ya que contiene información relacionada con otras areas del sistema'
            ]);
        }
    }


    public function datos(Request $request) {
        $dato=Dato::create([
            'detalle'=>$request->all()
        ]);
    }
    
}
