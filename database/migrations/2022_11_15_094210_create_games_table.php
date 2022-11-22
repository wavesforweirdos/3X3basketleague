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
            $table->foreignId('id_leagues')
                ->constrained('leagues')
                ->OnDelete('cascade')
                ->OnUpdate('cascade');
            $table->foreignId('id_teams_local')
                ->constrained('teams')
                ->OnDelete('cascade')
                ->OnUpdate('cascade');
            $table->foreignId('id_teams_visiting')
                ->constrained('teams')
                ->OnDelete('cascade')
                ->OnUpdate('cascade');
            $table->timestamp('start_time');
            $table->timestamp('end_time')->nullable();
            $table->string('score')->nullable();
            $table->foreignId('referees_id')->constrained('referees')->onDelete('cascade')->onUpdate('cascade');
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
