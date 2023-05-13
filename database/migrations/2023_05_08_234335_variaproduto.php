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
        Schema::create('variaproduto', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_produto');
            $table->foreign('id_produto')->references('id')->on('produtos')->onDelete('cascade');
            $table->unsignedBigInteger('id_variacao');
            $table->foreign('id_variacao')->references('id')->on('variacao')->onDelete('cascade');
            $table->unsignedBigInteger('tipovariacao_id');
            $table->foreign('tipovariacao_id')->references('id')->on('tipos_variacao')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('variaproduto');
    }
};
