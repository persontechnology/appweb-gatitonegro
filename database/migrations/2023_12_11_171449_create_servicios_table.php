<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre')->nullable();
            $table->text('detalle')->nullable();
            $table->enum('estado',['ACTIVO','INACTIVO'])->nullable();
            $table->integer('capacidad_personas')->nullable();
            $table->string('dimensiones')->nullable();
            $table->decimal('precio_hora')->nullable();
            $table->string('foto_1')->nullable();
            $table->string('foto_2')->nullable();
            $table->string('foto_3')->nullable();
            $table->string('foto_4')->nullable();
            
            $table->foreignId('tipo_reserva_id')->constrained(
                table: 'tipo_reservas'
            );

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicios');
    }
};
