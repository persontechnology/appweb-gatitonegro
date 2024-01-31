<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $fillable=[
        'nombre',
        'detalle',
        'estado',
        'capacidad_personas',
        'dimensiones',
        'precio_hora',
        'foto_1',
        'foto_2',
        'foto_3',
        'foto_4',
        'tipo_reserva_id',
    ];


    public function tipoReserva()
    {
        return $this->belongsTo(TipoReserva::class);
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    
}
