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
        Schema::create('reclamo', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_libros');
            $table->string('nombre');
            $table->unsignedBigInteger('cedula');
            $table->unsignedBigInteger('id_matricula');
            $table->unsignedBigInteger('id_seccion');
            

            $table->foreign('id_libros')    
            ->references('id')
            ->on('libros');

                $table->foreign('id_matricula')
                ->references('id')
                ->on('matricula');

            $table->foreign('id_seccion')
                ->references('id')
                ->on('seccion');

                
            $table->date('fecha_tope');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reclamo');
    }
};
