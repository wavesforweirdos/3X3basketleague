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
        Schema::create('team_admin_users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
            $table->foreignId('id_entities')
            ->constrained('entities')
            ->OnDelete('cascade')
            ->OnUpdate('cascade');
            $table->foreignId('id_teams')
            ->constrained('teams')
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
        Schema::dropIfExists('team_admin_users');
    }
};
