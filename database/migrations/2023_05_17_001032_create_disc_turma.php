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
        Schema::create('disc_turma', function (Blueprint $table) {
            $table->id();
            $table->time('carga_horaria');
            $table->time('id_turma');
            $table->time('id_disciplina');
            $table->timestamps();
            $table->foreign('id_turma')->references('id')->on('turma');
            $table->foreign('id_disciplina')->references('id')->on('disciplina');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disc_turma');
    }
};
