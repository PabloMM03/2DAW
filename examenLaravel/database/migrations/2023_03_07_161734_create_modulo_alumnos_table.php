<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulo_alumnos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('id_modulo');
            $table->unsignedBigInteger('id_alumno');
            
            $table->foreign('id_modulo')->references('id')->on('modulos')->onDelete('cascade');
            $table->foreign('id_alumno')->references('id')->on('alumnos')->onDelete('cascade');
            
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modulo_alumnos');
    }
};
