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
            $table->text('nome_completo')->default(0); // nome completo aceita apenas 30 caracteres, validado no back-end e no front-end
            $table->text('email')->default(0);
            $table->text('dt_nasc')->default(0);
            $table->text('nat_ocup')->default(0);
            $table->text('sexo')->default(0); // sexo
            $table->text('nacionalidade')->default(0); // nacionalidade
            $table->text('cidade')->default(0); // cidade de nascimento
            $table->text('uf_nasc')->default(0); // unidade federal de nascimento
            $table->text('tp_doc')->default(0); // tipo do documento
            $table->text('nr_doc')->default(0); // número do documento
            $table->text('emissor'); // orgão emissor do documento
            $table->text('nome_mae')->default(0); // nome completo da mãe
            $table->text('grau_instr')->default(0);
            $table->text('nome_conj')->default(0);
            $table->text('cpf_conj')->default(0);
            $table->text('dt_nasc_conj')->default(0);
            $table->text('sexo_conj')->default(0);
            $table->text('cep_res')->default(0);
            $table->text('end_res')->default(0);
            $table->text('num_res')->default(0);
            $table->text('compl_res')->default(0);
            $table->text('bairro_res')->default(0);
            $table->text('cidade_res')->default(0);
            $table->text('uf_res')->default(0);
            $table->text('tipo_res')->default(0);
            $table->text('tel_fixo')->default(0);
            $table->text('tel_cel')->default(0);
            $table->integer('operador')->default(0);
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


