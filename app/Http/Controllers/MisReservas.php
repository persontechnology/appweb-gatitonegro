<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
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
}
