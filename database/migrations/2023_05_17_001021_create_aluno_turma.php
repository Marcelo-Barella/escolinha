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
        Schema::create('pessoa_turma', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pessoa');
            $table->integer('id_turma');
            $table->timestamps();
            $table->foreign('id_pessoa')->references('id')->on('pessoas');
            $table->foreign('id_turma')->references('id')->on('turma');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aluno_turma');
    }
};
