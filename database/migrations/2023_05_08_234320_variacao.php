<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variacao', function (Blueprint $table) {
            $table->id();
            $table->string('estoque');
            $table->string('preco');
            $table->unsignedBigInteger('tipovariacao_id');
            $table->foreign('tipovariacao_id')->references('id')->on('tipos_variacao')->onDelete('cascade');
            $table->string('variacao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('variacao');
    }
};
