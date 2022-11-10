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
        Schema::create('classifications', function (Blueprint $table) {
            $table->foreignId('competitions_id')
                ->constrained('competitions')
                ->OnDelete('cascade')
                ->OnUpdate('cascade');
            $table->tinyint('posicion');
            $table->foreignId('teams_id')
            ->constrained('teams')
            ->OnDelete('cascade')
            ->OnUpdate('cascade');
            $table->tinyint('p_jugados');
            $table->tinyint('p_ganados');
            $table->tinyint('p_perdidos');
            $table->tinyint('pts_afavor');
            $table->tinyint('pts_encontra');
            $table->tinyint('puntuacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classifications');
    }
};
