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
        Schema::create('libros', function (Blueprint $table) {
        $table->id();

        $table->string('titulo');
        $table->unsignedBigInteger('id_ano_academico');
        $table->unsignedBigInteger('id_asignatura');
        $table->integer('cantidad');

        $table->foreign('id_ano_academico')
                ->references('id')
                ->on('ano_academico');


        $table->foreign('id_asignatura')
                ->references('id')
                ->on('asignaturas');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
