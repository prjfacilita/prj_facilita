<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CriarTableDocumentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('documentos', function (Blueprint $table) {

            /*  NR_PEDIDO
                TIPO
                Data
                STATUS_DOC
                nome_doc

            */
            $table->increments('id');
            $table->string('nr_pedido')->nullable();
            $table->string('tipo');
            $table->string('data_doc');
            $table->string('status_doc');
            $table->string('nome_doc');
//            $table->LONGBLOB('base64_doc');
            $table->string('id_cadastro');
            $table->string('tipo_doc');
            $table->string('nr_doc')->default(0);
//            $table->timestamps();


        });

        DB::statement("ALTER TABLE documentos ADD base64_dc LONGBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('documentos');
    }
}
