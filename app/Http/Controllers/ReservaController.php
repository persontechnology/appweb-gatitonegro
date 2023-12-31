<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Servicio;
use App\Models\User;
use App\Notifications\EnviarReserva;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class ReservaController extends Controller
{
    
    public function detalle($id)
    {
        $servicio=Servicio::findOrFail($id);
        $reservas=$servicio->reservas()->whereIn('estado',['SOLICITADO','RESERVADO'])->get();
        $resultadoParaCalendario=$reservas->map(function($reserva){
            return [
                'title' => $reserva->servicio->nombre,
                'start' => $reserva->fecha_inicio,
                'end' => $reserva->fecha_final,
                'color'=>$reserva->estado==='SOLICITADO'?'#f58646':'#059669' // SOLICTADO:success, reservado:warning
                
            ];
        });
    
        $data = array(
            'servicio'=>$servicio,
            'reservas'=>$resultadoParaCalendario,
            'user'=>Auth::user()
        );
        return view('reservas.detalle',$data);
    }

    public function guardar(Request $request) {
        $request->validate([
            'servicio_id'=>'required',
            'apellidos'=>'required',
            'nombres'=>'required',
            'identificacion'=>'required',
            'telefono'=>'required',
            'direccion'=>'required',
            'fecha_inicio'=>'required',
            'cantidad_horas'=>'required',
        ]);
        
        
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
            $reserva->user_id=Auth::user()->id;
            $reserva->servicio_id=$request->servicio_id;
            $reserva->precio=$servicio->precio_hora;
            $reserva->fecha_inicio=$fecha_inicio;
            $reserva->fecha_final=$fecha_final;
            $reserva->cantidad_horas=$request->cantidad_horas;
            $reserva->detalle_cliente=$request->detalle;
            $reserva->save();

            // ACTUALIZAMOS DATOS DE CLIENTE
            $user=Auth::user();
            $user->apellidos=$request->apellidos;
            $user->nombres=$request->nombres;
            $user->identificacion=$request->identificacion;
            $user->telefono=$request->telefono;
            $user->direccion=$request->direccion;
            $user->save();

            // ENVIAR NOTIFICACION CLIENTE Y ADMIN
            $users=User::where(function($query){
                $query->where('id',Auth::id());
                $query->orWhere('perfil','ADMIN');
            })->get();

            Notification::send($users, new EnviarReserva($reserva));

            $msg='La presente reserva de '.$reserva->servicio->nombre.', ha sido enviada a su correo electrónico '.$reserva->user->email.'. Agradecemos su reserva y le recordamos que deberá
            acercarse al lugar con el recibo enviado a su correo para efectuar el pago el día de la reserva. La Secretaría se pondrá en contacto
            con usted a la brevedad posible para validar información y confirmar la reserva.';
            return redirect()->route('mis-reserva.index')->with('success',$msg);
        }else{
            return back()->withInput($request->all())->with('danger',$servicio->nombre.' NO DISPONIBLE, PORFAVOR SELECIONE OTRA FECHA');
        }
        
    }
}
