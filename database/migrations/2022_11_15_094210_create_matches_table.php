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
            $table->foreignId('referee_teams_id')
                ->constrained('referee_teams')
                ->OnDelete('cascade')
                ->OnUpdate('cascade');
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
