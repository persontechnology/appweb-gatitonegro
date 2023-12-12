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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->enum('perfil',['ADMIN','CLIENTE'])->default('CLIENTE');
            $table->enum('estado',['ACTIVO','INACTIVO'])->default('ACTIVO');
            $table->string('apellidos')->nullable();
            $table->string('nombres')->nullable();
            $table->string('identificacion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('direccion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
