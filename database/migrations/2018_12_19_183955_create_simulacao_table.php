<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSimulacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('simulacao', function (Blueprint $table) {
            $table->increments('id');
            $table->string('taxaJurosMensal');
            $table->string('valorSolicitado');
            $table->string('qteParcelas');
            $table->string('dataPrimeiraParcela');
            $table->string('tarifaCadastro');
            $table->string('ValorParcela');
            $table->integer('user_id')->default(0);
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
        Schema::dropIfExists('simulacao');
    }
}
