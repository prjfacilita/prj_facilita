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
            $table->string('nome_completo')->default(0); // nome completo aceita apenas 30 caracteres, validado no back-end e no front-end
            $table->string('email')->default(0);
            $table->string('dt_nasc')->default(0);
            $table->string('nat_ocup')->default(0);
            $table->string('sexo')->default(0); // sexo
            $table->string('nacionalidade')->default(0); // nacionalidade
            $table->string('cidade')->default(0); // cidade de nascimento
            $table->string('uf_nasc')->default(0); // unidade federal de nascimento
            $table->string('tp_doc')->default(0); // tipo do documento
            $table->string('nr_doc')->default(0); // número do documento
            $table->string('emissor')->default(0); // orgão emissor do documento
            $table->string('nome_mae')->default(0); // nome completo da mãe
            $table->string('telefone_contato')->default(0)->nullable();
            $table->string('grau_instr')->default(0);
            $table->string('nome_conj')->default(0)->nullable();
            $table->string('cpf_conj')->default(0)->nullable();
            $table->string('dt_nasc_conj')->default(0)->nullable();
            $table->string('sexo_conj')->default(0)->nullable();
            $table->string('cep_res')->default(0);
            $table->string('end_res')->default(0);
            $table->string('num_res')->default(0);
            $table->string('compl_res')->default(0);
            $table->string('bairro_res')->default(0);
            $table->string('cidade_res')->default(0);
            $table->string('uf_res')->default(0);
            $table->string('tipo_res')->default(0);
            $table->string('tel_fixo')->default(0);
            $table->string('tel_cel')->default(0);
            $table->string('pb_exposta')->default(0);
            $table->integer('operador')->default(0);
            $table->string('estado_civil')->default(0);



            /*SEGUNDA PARTE CADASTRO*/
            $table->string('salario')->default(0);
            $table->string('ocupacao')->default(0);
            $table->string('escolaridade')->default(0);
            $table->string('profissao')->default(0);
            $table->string('cargo')->default(0);
            $table->string('empresa')->default(0);
            $table->string('data_admissao')->default(0);
            $table->string('end_comercial')->default(0);
            $table->string('end_comercial_nro')->default(0);
            $table->string('end_comercial_cep')->default(0);
            $table->string('bairro_comerc')->default(0);
            $table->string('cidade_comerc')->default(0);
            $table->string('uf_comerc')->default(0);
            $table->string('compl_comerc')->default(0);
            $table->string('tel_comerc')->default(0);
            $table->string('ramal')->default(0);
            $table->string('val_patriominio')->default(0);
            $table->string('status_cadastro')->default(0);











            // criar estado_civil
            //solicitation_emission_id criar data de emissão
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


