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
            $table->string('nombre');
            $table->foreignId('categories_id')
            ->constrained('categories')
            ->OnDelete('cascade')
            ->OnUpdate('cascade');
            $table->foreignId('clubs_id')
            ->constrained('clubs')
            ->OnDelete('cascade')
            ->OnUpdate('cascade');
            $table->string('pista_habitual');
            $table->string('dia_habitual');
            $table->string('hora_habitual');
            $table->string('camiseta_1equip');
            $table->string('camiseta_2equip');
            $table->string('pantalon_1equip');
            $table->string('pantalon_2equip');
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
