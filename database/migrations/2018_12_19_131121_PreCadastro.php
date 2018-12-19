<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PreCadastro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

//        CPF
//NOME_COMPL(30 Caract)
//EMAIL
//CELULAR
//STATUS

        Schema::dropIfExists('pre_cadastro');
        Schema::create('pre_cadastro', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('cpf');
            $table->text('nome_compl');
            $table->text('email');
            $table->text('celular');
            $table->text('status');
//            $table->timestamp('failed_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //

        Schema::dropIfExists('pre_cadastro');
    }
}
