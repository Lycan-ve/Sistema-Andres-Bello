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
            $table->unsignedBigInteger('id_ano_academico');
            $table->foreign('id_libros')
            ->references('id')
            ->on('libros');


            $table->foreign('id_ano_academico')
            ->references('id')
            ->on('ano_academico');

            $table->timestamps('tiempo_emision');
            $table->date('tiempo_entrega')->nullable();

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
