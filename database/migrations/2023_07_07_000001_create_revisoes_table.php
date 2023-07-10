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
        Schema::create('revisoes', function (Blueprint $table) {
            $table->id();
            $table->string('data');
            $table->string('tipo');
            $table->string('descricao');
            $table->unsignedBigInteger('id_carro');
            $table->timestamps();

            $table->foreign('id_carro')->references('id')->on('carros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('revisoes');
    }
};
