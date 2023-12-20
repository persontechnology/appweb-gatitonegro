<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use PhpParser\Node\Stmt\TryCatch;

class MisReservas extends Controller
{
    public function index(){

        $user=Auth::user();
        $data = array(
            'reservas'=>$user->reservas
        );
        return view('mis-reservas.index',$data);
    }

    public function reciboPdf($id) {
        
        $reserva=Reserva::findOrFail($id);
        $data = array(
            'reserva'=>$reserva
        );
        $pdf = PDF::loadView('mis-reservas.recibo-pdf',$data);
        return $pdf->inline('invoice.pdf');
    }

    public function eliminar($id)  {
        $reserva=Reserva::findOrFail($id);
        
        try {
            
            if($reserva->user->id===Auth::id()){
                $reserva->delete();
                return redirect()->route('mis-reserva.index')->with('success','RESERVA ELIMINADO EXITOSAMENTE');    
            }else{
                return redirect()->route('mis-reserva.index')->with('info','NO SE PUEDE ELIMINAR PORQUE LA RESERVA NO PERTENECE A USTED.');    
            }
            
        } catch (\Throwable $th) {
            return redirect()->route('mis-reserva.index')->with('danger','RESERVA NO ELIMINADO YA QUE SE ENCUENTRA RELACIONADO CON OTROS MODULOS DLE SISTEMA');    
        }   
    }

    public function detalle($id) {
        $reserva=Reserva::findOrFail($id);
        if($reserva->user->id==Auth::id()){
            $data = array(
                'reserva'=>$reserva
            );
            return view('mis-reservas.detalle',$data);
        }else{
            return abort(404);
        }
    }
}
