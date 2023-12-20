<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservasAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = array(
            'reservas'=>Reserva::latest()->get()
        );
        return view('reservas.index',$data);
    }

   public function estado($id,Request $request) {
        $reserva=Reserva::findOrFail($id);
        $reserva->estado=$request->estado;
        $reserva->detalle_admin=$request->detalle_admin;
        $reserva->save();
        return redirect()->route('reservas-admin.index')->with('success','RESERVA '.$reserva->estado);

   }
}
