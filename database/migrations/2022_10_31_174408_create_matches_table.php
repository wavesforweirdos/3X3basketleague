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
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('competitions_id')
            ->constrained('competitions')
            ->OnDelete('cascade')
            ->OnUpdate('cascade');
            $table->foreignId('categories_id')
            ->constrained('categories')
            ->OnDelete('cascade')
            ->OnUpdate('cascade');
            $table->foreignId('local_id')
            ->constrained('teams')
            ->OnDelete('cascade')
            ->OnUpdate('cascade');
            $table->foreignId('visitante_id')
            ->constrained('teams')
            ->OnDelete('cascade')
            ->OnUpdate('cascade');
            $table->foreignId('referee_teams_id')
            ->constrained('referee_teams')
            ->OnDelete('cascade')
            ->OnUpdate('cascade');
            $table->string('acta');
            $table->date('fecha');
            $table->enum('resultado',['local', 'visitante']);
            $table->string('instalaciones');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
};
