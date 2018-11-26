<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoginTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('login', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password')->default('testesistema');
            $table->string('permissao');
            $table->string('cpf')->unique();
            $table->integer('status')->default('1');;
            $table->string('confirmation_code')->nullable();
            $table->rememberToken();
            $table->integer('termos_contrato')->default('1');
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
        //
        Schema::dropIfExists('login');
    }
}
