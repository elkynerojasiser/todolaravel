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
        Schema::create('tareas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->unique();
            $table->text('descripcion')->nullable();
            $table->enum('estado',['pendiente','iniciada','terminada'])->default('pendiente');
            $table->unsignedBigInteger('proyecto_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->timestamps();

            $table->foreign('proyecto_id')->references('id')->on('proyectos')
            ->onUpdate('cascade')->onDelete('restrict');

            $table->foreign('user_id')->references('id')->on('users')
            ->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tareas');
    }
};
