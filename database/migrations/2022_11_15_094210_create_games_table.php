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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->timestamp('start_time');
            $table->time('duration')->nullable();
            $table->foreignId('league_id')->constrained('leagues')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_teams_local')->constrained('teams')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_teams_visiting')->constrained('teams')->onDelete('cascade')->onUpdate('cascade');
            $table->string('score_local')->nullable();
            $table->string('score_visiting')->nullable();
            $table->integer('state')->nullable();
            $table->foreignId('id_referees')->constrained('referees')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
};
