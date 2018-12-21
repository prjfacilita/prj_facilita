<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cadastro extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cadastro', function (Blueprint $table) {
            /*CPF
NOME_COMPL(30 Caract)
EMAIL
DT_NASC
NAT_OCUP
SEXO
NACIONALIDADE
CIDADE
UF_NASC
TP_DOC
NR_DOC
EMISSOR
NOME_MAE
GRAU_INSTR
NOME_CONJ
CPF_CONJ
DT_NASC_CONJ
SEXO_CONJ
CEP_RES
END_RES
NUM_RES
COMPL_RES
BAIRRO_RES
CIDADE_RES
UF_RES
TIPO_RES
TEL_FIXO
TEL_CEL*/
            $table->increments('id');
            $table->text('nome_completo'); // nome completo aceita apenas 30 caracteres, validado no back-end e no front-end
            $table->text('email');
            $table->text('dt_nasc');
            $table->text('nat_ocup');
            $table->text('sexo'); // sexo
            $table->text('nacionalidade'); // nacionalidade
            $table->text('cidade'); // cidade de nascimento
            $table->text('uf_nasc'); // unidade federal de nascimento
            $table->text('tp_doc'); // tipo do documento
            $table->text('nr_doc'); // número do documento
            $table->text('emissor'); // orgão emissor do documento
            $table->text('nome_mae'); // nome completo da mãe
            $table->text('grau_instr');
            $table->text('nome_conj');
            $table->text('cpf_conj');
            $table->text('dt_nasc_conj');
            $table->text('sexo_conj');
            $table->text('cep_res');
            $table->text('end_res');
            $table->text('num_res');
            $table->text('compl_res');
            $table->text('bairro_res');
            $table->text('cidade_res');
            $table->text('uf_res');
            $table->text('tipo_res');
            $table->text('tel_fixo');
            $table->text('tel_cel');
            $table->integer('operador');
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
        Schema::dropIfExists('cadastro');
    }
}


