<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\TipoReserva;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $email='admin@gmail.com';
        $user=User::where('email',$email)->first();
        if(!$user){
            $user=new User();
            $user->email=$email;
            $user->password=Hash::make($email);
            $user->name=$email;
            $user->perfil='ADMIN';
            $user->save();
        }


        $tiposReservas = array(
            'Canchas de boli', 
            'Canchas de fútbol', 
            'Recepciones',  
            'Espacios destinados a eventos'
        );

        foreach ($tiposReservas as $tr) {
            $t=TipoReserva::where('nombre',$tr)->first();
            if(!$t){
                $t=new TipoReserva();
                $t->nombre=$tr;
                $t->save();
            }
        }

    }
}
