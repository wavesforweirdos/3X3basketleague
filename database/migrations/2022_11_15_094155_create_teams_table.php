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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('id_categories')
            ->constrained('categories')
            ->OnDelete('cascade')
            ->OnUpdate('cascade');
            $table->foreignId('id_leagues')
            ->constrained('leagues')
            ->OnDelete('cascade')
            ->OnUpdate('cascade');
            $table->foreignId('id_clubs')
            ->constrained('clubs')
            ->OnDelete('cascade')
            ->OnUpdate('cascade')
            ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
    }
};
