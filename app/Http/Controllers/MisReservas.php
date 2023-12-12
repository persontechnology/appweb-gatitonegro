<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MisReservas extends Controller
{
    public function index(){

        $user=Auth::user();
        $data = array(
            'reservas'=>$user->reservas
        );
        return view('mis-reservas.index',$data);
    }
}
