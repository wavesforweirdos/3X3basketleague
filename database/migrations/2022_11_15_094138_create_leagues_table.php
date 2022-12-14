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
        Schema::create('leagues', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // $table->string('slug');
            $table->string('logo')->nullable();
            $table->tinyInteger('min_age');
            $table->tinyInteger('max_players');
            $table->string('team_gender',7)->default('f,m,x');
            $table->date('start_day');
            $table->date('end_day')->nullable();
            $table->date('registration_day');
            $table->foreignId('id_basket_courts')->constrained('basket_courts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_entities')->constrained('entities')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leagues');
    }
};
