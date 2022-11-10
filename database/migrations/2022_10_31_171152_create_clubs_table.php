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
        Schema::create('clubs', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('presidente');
            $table->string('director_tecnico');
            $table->foreignId('directions_id')
                ->constrained('directions')
                ->OnDelete('cascade')
                ->OnUpdate('cascade');
            $table->foreignId('contacts_id')
                ->constrained('contacts')
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
        Schema::dropIfExists('clubs');
    }
};
