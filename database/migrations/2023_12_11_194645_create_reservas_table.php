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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('user_id')->constrained(
                table: 'users'
            );

            $table->foreignId('servicio_id')->constrained(
                table: 'servicios'
            );

            $table->decimal('precio')->nullable();
            $table->dateTime('fecha_inicio')->nullable();
            $table->dateTime('fecha_final')->nullable();
            $table->integer('cantidad_horas')->nullable();
            $table->text('detalle_admin')->nullable();
            $table->text('detalle_cliente')->nullable();
            $table->enum('estado',['SOLICITADO','RESERVADO','RECHAZADO'])->default('SOLICITADO');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
