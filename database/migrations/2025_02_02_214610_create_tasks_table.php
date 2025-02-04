<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tareas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade'); // Relación con usuarios
            $table->string('titulo', 255);
            $table->text('descripcion')->nullable();
            $table->boolean('completada')->default(false);
        });
    }

    public function down()
    {
        Schema::dropIfExists('tareas');
    }

};
