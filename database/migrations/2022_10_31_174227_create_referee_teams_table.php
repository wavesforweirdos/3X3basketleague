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
        Schema::create('referee_teams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('anotador_id')
                ->constrained('referee')
                ->OnDelete('cascade')
                ->OnUpdate('cascade');
            $table->foreignId('cronometrador_id')
                ->constrained('referee')
                ->OnDelete('cascade')
                ->OnUpdate('cascade');
            $table->foreignId('operador_id')
                ->constrained('referee')
                ->OnDelete('cascade')
                ->OnUpdate('cascade');
            $table->foreignId('referee_principal_id')
                ->constrained('referee')
                ->OnDelete('cascade')
                ->OnUpdate('cascade');
            $table->foreignId('referee_secundario_id')
                ->constrained('referee')
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
        Schema::dropIfExists('referee_teams');
    }
};
