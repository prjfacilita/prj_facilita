<!doctype html>
<html lang="pt-BR">
<head>
    <title>Facillita</title>
    <!-- Required meta tags -->
    <meta name="description" content="Faça sua solicitação de emprestimo">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <!-- CSS -->

    <link rel="stylesheet" type="text/css"  href="{{ asset('fonts/fonts.css') }}">

    <link rel="stylesheet" type="text/css"  href="assets/pedido/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"  href="assets/pendencias/css/style.css">
    <link rel="stylesheet" type="text/css"  href="assets/pedido/css/style-pedido-emprestimo.css">
    <link rel="stylesheet" type="text/css"  href="assets/pedido/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css"  href="assets/pedido/css/loading.css">

    {{--<link rel="stylesheet" type="type/css" href="assets/pedido/css/menu.css">--}}

    <!-- SCRIPT -->
    <script src="assets/pedido/js/jquery-3.3.1.min.js"></script>
    <script src="assets/pedido/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        var APP_URL = {!! json_encode(url('/')) !!}
    </script>




    <script>

    </script>

</head>

<body>

<div class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p>Atenção! A Facilita não solicita depósito antecipado para empréstimo. Em caso de dúvida entre em contato.</p>
            </div>
        </div>
    </div>
</div>

<header>
    <div class="container">
        <div class="row">
            <a class="logomarca" href="#"><img src="assets/pedido/images/logo-facilita.png" alt="Logomarca Facilita" class="image-logomarca"/></a>
            <div class="user-logged">
                <img src="assets/pedido/images/icon-user.png" alt="Ícone Usuário" class="icon-user-logged"/>
                <p  class="mr-5" style="color: #fff;">Olá {{Auth::user()->email}}, pedido em andamento!</p>

            </div>



            <div class="nav">
                <nav>
                    <ul>
                        <li class="nav-text"><a>Menu<i class="fa fa-caret-down" aria-hidden="true"></i></a></i>
                            <ul class="sub-menu">
                                <li><a href="#">Meus emprestimos</a></li>
                                <li class="nav-config"><a href="#">senha</a></li>
                                <li><a href="{{route('logout')}}">sair</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>

<div class="page-content">

    <!-- solicitation header-->
    <section class="solicitation-header">
        <div class="container">
            <div class="row">

                <div class="col-sm-3 solicitation-header__area solicitation-header__active">
                    <div>
                        <span>1</span>
                        <h2>Faça seu pedido</h2>
                    </div>
                </div>

                <div class="col-sm-3 solicitation-header__area">
                    <div>
                        <span>2</span>
                        <h2>Veja nossa proposta</h2>
                    </div>
                </div>

                <div class="col-sm-3 solicitation-header__area">
                    <div>
                        <span>3</span>
                        <h2>Envie seus documentos</h2>
                    </div>
                </div>

                <div class="col-sm-3 solicitation-header__area">
                    <div>
                        <span>4</span>
                        <h2>Receba em dinheiro</h2>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- solicitation header-->

    <!-- solicitation inf-->
    <section class="solicitation-inf">
        <div class="container">
            <div class="row">

                {{--<div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>--}}
                <div class="col-sm-3 solicitation-inf-area solicitation-date">
                    <p>Data da solicitação</p>
                    <span>{{ \Carbon\Carbon::parse($data_solicitacao)->format('d/m/Y')}}</span>
                </div>

                <div class="col-sm-3 solicitation-inf-area solicitation-value">
                    <p>Valor da solicitação</p>
                    <span>R$ {{$valor_solicitacao}}</span>
                </div>

                <div class="col-sm-3 solicitation-inf-area solicitation-payment">
                    <p>Pagamento em</p>
                    <span>{{$qtde_parcelas}}</span>
                </div>

                <div class="col-sm-3 solicitation-inf-area solicitation-reason">
                    <p>Motivo</p>
                    <span style="font-size:13px;">{{$finalidade}}</span>

                    <a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" class="solicitation-inf__alter">Alterar</a>
                </div>

            </div>
        </div>
    </section>
    <!-- solicitation inf-->

    <!-- solicitation form-->
    <section class="solicitation-register">
        <div class="container">
            <div class="row">
                <div class="col-12 solicitation-register__area">


                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Alterar pedido</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form>

                                        <div class="solicitation-register__form">
                                            <div class="col-sm-10">
                                                <label>Nome: <input type="text" id="solicitation_name" name="solicitation-name" class="solicitation-form__name solicitation-input" value="@foreach ($data_cadastro as $rec){{ $rec->nome_completo }}@endforeach  " onkeypress="return this.value.length<=30 " required></label>
                                            </div>

                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Parcelas:</label>
                                            <input type="text" class="solicitation-form__name solicitation-input" id="recipient-name">
                                        </div>



                                        </div>


                                        {{--<div class="form-group">--}}
                                            {{--<label>Alterar data vencimento: <input type="date" name="solicitation-birth" value="@foreach ($data_cadastro as $rec){{ $rec->dt_nasc }}@endforeach" class="solicitation-form__birth solicitation-input" required></label>--}}

                                        {{--</div>--}}

                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success salvar_alteracao_pedido">Salvar</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="solicitation-accordion">
                        <div id="accordion">

                            <!-- formulário de dados pessoais -->
                            <div class="solicitation-accordion-form card">
                                <div>
                                    <a class="card-link" data-toggle="collapse" href="#form-1">
                                        Dados Pessoais
                                    </a>
                                </div>

                                <div class="loading">Validando dados, aguarde!&#8230;</div>

                                <div id="form-1" class="accordion-form collapse show" data-parent="#accordion">
                                    <div class="card-body">
                                        <h3>Dados Pessoais</h3>
                                        <div class="solicitation-register__form">

                                            <!-- inicio form -->
                                            <form action="{{route('pedido_emprestimo_parte01')}}" class="pedido_emprestimo_parte01" id="pedido_emprestimo_parte01" method="post" >
                                                {{ csrf_field() }}
                                                <div class="col-sm-10">
                                                    <label>Nome: <input type="text" id="solicitation_name" name="solicitation-name" class="solicitation-form__name solicitation-input" value="@foreach ($data_cadastro as $rec){{ $rec->nome_completo }}@endforeach  " onkeypress="return this.value.length<=30 " required></label>
                                                </div>

                                                <div class="col-sm-2">
                                                    <label>Nascimento: <input type="date" name="solicitation-birth" value="@foreach ($data_cadastro as $rec){{ $rec->dt_nasc }}@endforeach" class="solicitation-form__birth solicitation-input" required></label>
                                                </div>

                                                <div class="col-sm-3">
                                                    <label>Nro. Documento: <input type="text" name="solicitation-doc" class="solicitation-form__id solicitation-input" value="@foreach ($data_cadastro as $rec){{ $rec->nr_doc }} @endforeach" required></label>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label>Tipo Documento:
                                                        <select value="@foreach ($data_cadastro as $rec){{ $rec->tp_doc}} } @endforeach" name="tipo-documento" id="tipo-documento" required>
                                                            <option disabled selected>Selecionar</option>
                                                                <option value="RG">RG</option>
                                                            <option value="CNH">CNH</option>
                                                            <option value="PASSAPORTE">Passaporte</option>
                                                            <option value="RNE">RNE</option>
                                                            <option value="CARTEIRA_FUNCIONAL">Carteira funcional</option>
                                                            <option value="CARTEIRA_DE_CLASSE">Carteira de classe</option>
                                                        </select></label>
                                                </div>


                                                <div class="col-sm-2">
                                                    <label>Data de Emissão: <input required type="date" name="solicitation-emission-id" class="solicitation-form__id solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-3">
                                                    <label>Orgão Expedidor: <input required type="text" name="solicitation-organ" value="@foreach ($data_cadastro as $rec){{ $rec->emissor}}@endforeach" class="solicitation-form__id solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-2">
                                                    <label>Sexo:
                                                        <select required name="sexo" id="sexo">
                                                            <option disabled selected>Selecionar</option>
                                                            <option value="FEMININO">Feminino</option>
                                                            <option value="MASCULINO">Masculino</option>
                                                        </select></label>
                                                </div>

                                                <div class="col-sm-2">
                                                    <label>Estado Civil:
                                                        <select required name="estado_civil" id="estado_civil">
                                                            <option disabled selected>Selecionar</option>
                                                            <option value="CASADO">Casado</option>
                                                            <option value="SOLTEIRO">Solteiro</option>
                                                            <option value="DIVORCIADO">Divorciado</option>
                                                            <option value="VIUVO">Viúvo</option>
                                                            <option value="UNIAO_ESTAVEL">União Estável</option>
                                                        </select></label>
                                                </div>



                                                <div class="col-sm-4">
                                                    <label>Nacionalidade: <input required type="text" name="nacionalidade" value="@foreach ($data_cadastro as $rec){{ $rec->nacionalidade}}@endforeach" class=" solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label>Naturalidade: <input required type="text" name="naturalidade" value="@foreach ($data_cadastro as $rec){{ $rec->nat_ocup}}@endforeach" class=" solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-2">
                                                    <label>UF Nascimento:
                                                        <select id="uf-nascimento" required name="uf-nascimento">
                                                            <option disabled selected>Selecionar</option>
                                                            <option value="ac">AC</option>
                                                            <option value="al">AL</option>
                                                            <option value="ap">AP</option>
                                                            <option value="am">AM</option>
                                                            <option value="ba">BA</option>
                                                            <option value="ce">CE</option>
                                                            <option value="df">DF</option>
                                                            <option value="es">ES</option>
                                                            <option value="go">GO</option>
                                                            <option value="ma">MA</option>
                                                            <option value="mt">MT</option>
                                                            <option value="ms">MS</option>
                                                            <option value="mg">MG</option>
                                                            <option value="pa">PA</option>
                                                            <option value="pb">PB</option>
                                                            <option value="pr">PR</option>
                                                            <option value="pe">PE</option>
                                                            <option value="pi">PI</option>
                                                            <option value="rj">RJ</option>
                                                            <option value="rn">RN</option>
                                                            <option value="rs">RS</option>
                                                            <option value="ro">RO</option>
                                                            <option value="rr">RR</option>
                                                            <option value="sc">SC</option>
                                                            <option value="sp">SP</option>
                                                            <option value="se">SE</option>
                                                            <option value="to">TO</option>
                                                        </select></label>
                                                </div>

                                                <div class="col-sm-3">
                                                    <label>Telefone: <input required type="text" name="telefone" value="@foreach ($data_cadastro as $rec){{ $rec->tel_fixo}}@endforeach" class="solicitation-form__phone solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-3">
                                                    <label>Celular: <input required type="text" name="celular" value="@foreach ($data_cadastro as $rec){{ $rec->tel_cel}}@endforeach" class="solicitation-form__phone solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label>Telefone de Recado e Contato: <input required type="text" name="telefone_recado" value="@foreach ($data_cadastro as $rec){{ $rec->telefone_contato}}@endforeach" class="solicitation-form__phone solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-6">
                                                    <label>Nome da Mãe<input required onkeypress="return this.value.length<=30" type="text" name="nome-mae" value="@foreach ($data_cadastro as $rec){{ $rec->nome_mae}}@endforeach" class="solicitation-form__name solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-6">
                                                    <label>Nome Cônjuge<input required onkeypress="return this.value.length<=30" type="text" name="nome_conjuge" value="@foreach ($data_cadastro as $rec){{ $rec->nome_conj}}@endforeach" class="solicitation-form__name solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label>CPF Cônjuge<input required type="text" name="cpf-conjuge" value="@foreach ($data_cadastro as $rec){{ $rec->cpf_conj}}@endforeach" class="solicitation-form__name solicitation-input"></label>
                                                </div>
                                                <div class="col-sm-2">
                                                    <label>Nascto Cônjuge: <input type="date" name="nascto-conjuge" value="@foreach ($data_cadastro as $rec){{ $rec->dt_nasc_conj}}@endforeach" class="solicitation-form__id solicitation-input"></label>
                                                </div>
                                                <div class="col-sm-2">
                                                    <label>Sexo Cônjuge:
                                                        <select required name="sexo-conjuge" id="sexo-conjuge">
                                                            <option disabled selected>Selecionar</option>
                                                            <option value="feminino">Feminino</option>
                                                            <option value="masculino">Masculino</option>
                                                        </select></label>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label>Publicamente Exposta?:
                                                        <select required name="publicamente-gexposta" id="publicamente-exposta">
                                                            {{--<option disabled>Selecionar</option>--}}
                                                            <option value="sim">Sim</option>
                                                            <option value="nao" selected>Não</option>
                                                        </select></label>
                                                </div>



                                            </form>
                                            <!-- fim form -->
                                        </div>

                                        <div class="solicitation-register-btn step_01">
                                            <a href="javascript:void(0);">Continuar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- fim formulário de dados pessoais -->

                            <!-- formulário de renda e ocupação  -->
                            <div class="solicitation-accordion-form card">
                                <div>
                                    <a class="card-link" data-toggle="collapse" href="#form-2">
                                        Renda e ocupação
                                    </a>
                                </div>

                                <div id="form-2" class="accordion-form collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <h3>Renda e ocupação</h3>
                                        <div class="solicitation-register__form">

                                            <!-- inicio form -->
                                            <form action="{{route('pedido_emprestimo_parte02')}}" method="post" >

                                                {{ csrf_field() }}

                                                <div class="col-sm-2">
                                                    <label>Salário: <input type="text" name="salario-name" class="salario_nome_input solicitation-form__name solicitation-input" value="@foreach ($data_cadastro as $rec){{ $rec->salario}}@endforeach"></label>
                                                </div>

                                                <div class="col-sm-5">
                                                    <label>Ocupação:
                                                        <select name="ocupacao" id="ocupacao-id">
                                                            <option disabled selected>Selecionar</option>
                                                            <option value="ASSALARIADO">EMPREGADO SETOR PRIVADO</option>
                                                            <option value="ASSALARIADO">EMPREGADO SETOR PÚBLICO</option>
                                                            <option value="ASSALARIADO">PROFISSIONAL LIBERAL</option>
                                                            <option value="ASSALARIADO">EMPRESÁRIO</option>
                                                            <option value="ASSALARIADO">APOSENTADO OU PENSIONISTA</option>
                                                            <option value="ASSALARIADO">AUTÔNOMO</option>
                                                            <option value="ASSALARIADO">OUTROS</option>
                                                        </select></label>
                                                </div>

                                                <div class="col-sm-5">
                                                    <label>Escolaridade:
                                                        <select id="escolaridade-id">
                                                            <option disabled selected>Selecionar</option>
                                                            <option value="1_grau_completo">1o. GRAU COMPLETO (FUNDAMENTAL)</option>
                                                            <option value="2_grau_completo">2o. GRAU COMPLETO (ENSINO MÉDIO)</option>
                                                            <option value="superior_incompleto">SUPERIOR INCOMPLETO</option>
                                                            <option value="superior_completo">SUPERIOR COMPLETO</option>
                                                            <option value="pos_graducao">PÓS-GRADUADO</option>
                                                        </select></label>
                                                </div>

                                                <div class="col-sm-6">
                                                    <label>Profissão: <input value="@foreach ($data_cadastro as $rec){{ $rec->profissao}}@endforeach" type="text" name="profissao-emission-id" class="solicitation-form__id solicitation-input"></label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Cargo: <input type="text" value="@foreach ($data_cadastro as $rec){{ $rec->cargo}}@endforeach" name="cargo-emission-id" class="solicitation-form__id solicitation-input"></label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <label>Empresa: <input value="@foreach ($data_cadastro as $rec){{ $rec->empresa}}@endforeach" type="text" name="empresa" class="solicitation-form__id solicitation-input"></label>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label>Data de Admissão: <input type="date" name="data-admissao" class="solicitation-form__id solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-8">
                                                    <label>Endereço Comercial: <input value="@foreach ($data_cadastro as $rec){{ $rec->end_comercial}}@endforeach" type="text" name="endereco_comercial" class=" solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-2">
                                                    <label>Nro: <input type="text" value="@foreach ($data_cadastro as $rec){{ $rec->end_comercial_nro}}@endforeach" name="endereco_comercial_nro" class=" solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-2">
                                                    <label>CEP: <input type="text" value="@foreach ($data_cadastro as $rec){{ $rec->end_comercial_cep}}@endforeach" name="endereco_comercial_cep" class="solicitation- solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-5">
                                                    <label>Bairro: <input type="text" value="@foreach ($data_cadastro as $rec){{ $rec->bairro_comerc}}@endforeach" name="endereco_comercial_bairro" class="solicitation- solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-5">
                                                    <label>Cidade: <input type="text" value="@foreach ($data_cadastro as $rec){{ $rec->cidade_comerc}}@endforeach" name="endereco_comercial_cidade" class="solicitation- solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-2">
                                                    <label>UF:
                                                        <select id="endereco_comercial_uf">
                                                            <option disabled selected>Selecionar</option>
                                                            <option value="ac">AC</option>
                                                            <option value="al">AL</option>
                                                            <option value="ap">AP</option>
                                                            <option value="am">AM</option>
                                                            <option value="ba">BA</option>
                                                            <option value="ce">CE</option>
                                                            <option value="df">DF</option>
                                                            <option value="es">ES</option>
                                                            <option value="go">GO</option>
                                                            <option value="ma">MA</option>
                                                            <option value="mt">MT</option>
                                                            <option value="ms">MS</option>
                                                            <option value="mg">MG</option>
                                                            <option value="pa">PA</option>
                                                            <option value="pb">PB</option>
                                                            <option value="pr">PR</option>
                                                            <option value="pe">PE</option>
                                                            <option value="pi">PI</option>
                                                            <option value="rj">RJ</option>
                                                            <option value="rn">RN</option>
                                                            <option value="rs">RS</option>
                                                            <option value="ro">RO</option>
                                                            <option value="rr">RR</option>
                                                            <option value="sc">SC</option>
                                                            <option value="sp">SP</option>
                                                            <option value="se">SE</option>
                                                            <option value="to">TO</option>
                                                        </select></label>
                                                </div>

                                                <div class="col-sm-7">
                                                    <label>Complemento do Endereço Comercial: <input type="text" name="complemento_endereco_comercial" class="solicitation- solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-3">
                                                    <label>Telefone Comercial: <input type="text" value="@foreach ($data_cadastro as $rec){{ $rec->compl_comerc}}@endforeach" name="telefone_comercial" class="solicitation-form__phone solicitation-input"></label>
                                                </div>
                                                <div class="col-sm-2">
                                                    <label>Ramal: <input type="text" value="@foreach ($data_cadastro as $rec){{ $rec->ramal}}@endforeach" name="ramal" class="solicitation- solicitation-input"></label>
                                                </div>



                                            </form>
                                            <!-- fim form -->
                                        </div>

                                        <div class="solicitation-register-btn step_02">
                                            <a href="javascript:void(0);">Continuar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- fim formulário renda e ocupação -->

                            <!-- formulário de endereço  -->
                            <div class="solicitation-accordion-form card">
                                <div>
                                    <a class="card-link" data-toggle="collapse" href="#form-3">
                                        Endereço
                                    </a>
                                </div>

                                <div id="form-3" class="accordion-form collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <h3>Endereço</h3>
                                        <div class="solicitation-register__form">

                                            <!-- inicio form -->
                                            <form action="{{route('pedido_emprestimo_parte03')}}" method="post" >

                                                {{ csrf_field() }}

                                                <div class="col-sm-2">
                                                    <label>CEP: <input type="text" name="cep" class="solicitation- solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-8">
                                                    <label>Endereço: <input type="text" name="endereco" class="solicitation- solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-2">
                                                    <label>Nro: <input type="text" name="nro" class="solicitation- solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-6">
                                                    <label>Complemento: <input type="text" name="complemento" class="solicitation- solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-6">
                                                    <label>Bairro: <input type="text" name="bairro" class="solicitation- solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label>Tipo de Residência:
                                                        <select id="tipo-residencia-id">
                                                            <option disabled selected>Selecionar</option>
                                                            <option value="propria_quitada">PRÓPRIA QUITADA</option>
                                                            <option value="propria_financiada">PRÓPRIA FINANCIADA</option>
                                                            <option value="alugada">ALUGADA</option>
                                                            <option value="de_familiares_ou_conjuge">DE FAMILIARES OU CÔNJUGE</option>

                                                        </select></label>
                                                </div>

                                                <div class="col-sm-6">
                                                    <label>Cidade: <input type="text" name="cidade" class="solicitation- solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-2">
                                                    <label>UF:
                                                        <select id="uf">
                                                            <option disabled selected>Selecionar</option>
                                                            <option value="ac">AC</option>
                                                            <option value="al">AL</option>
                                                            <option value="ap">AP</option>
                                                            <option value="am">AM</option>
                                                            <option value="ba">BA</option>
                                                            <option value="ce">CE</option>
                                                            <option value="df">DF</option>
                                                            <option value="es">ES</option>
                                                            <option value="go">GO</option>
                                                            <option value="ma">MA</option>
                                                            <option value="mt">MT</option>
                                                            <option value="ms">MS</option>
                                                            <option value="mg">MG</option>
                                                            <option value="pa">PA</option>
                                                            <option value="pb">PB</option>
                                                            <option value="pr">PR</option>
                                                            <option value="pe">PE</option>
                                                            <option value="pi">PI</option>
                                                            <option value="rj">RJ</option>
                                                            <option value="rn">RN</option>
                                                            <option value="rs">RS</option>
                                                            <option value="ro">RO</option>
                                                            <option value="rr">RR</option>
                                                            <option value="sc">SC</option>
                                                            <option value="sp">SP</option>
                                                            <option value="se">SE</option>
                                                            <option value="to">TO</option>
                                                        </select></label>
                                                </div>

                                                <div class="col-sm-3">
                                                    <label>Valor do Patrimônio: <input type="text" name="valor-patrimonio-name" class="valor_patrimonio_input solicitation-form__name solicitation-input"></label>
                                                </div>




                                            </form>
                                            <!-- fim form -->
                                        </div>

                                        <div class="solicitation-register-btn step_03">
                                            <a href="javascript:void(0);">Continuar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- fim formulário de endereço -->

                            <!-- formulário dados bancários  -->
                            <div class="solicitation-accordion-form card">
                                <div>
                                    <a class="card-link" data-toggle="collapse" href="#form-4">
                                        Dados bancários
                                    </a>
                                </div>

                                <div id="form-4" class="accordion-form collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <h3>Dados bancários e Referências Comerciais</h3>
                                        <div class="solicitation-register__form">

                                            <!-- inicio form -->

                                            <form action="{{route('pedido_emprestimo_parte04')}}" method="post" >

                                                {{ csrf_field() }}

                                                <div class="col-sm-3">
                                                    <label>BANCO:
                                                        <select id="banco-id">
                                                            <option disabled selected>Selecionar</option>
                                                            <option value="001">Banco do Brasil S.A.</option>
                                                            <option value="237">Banco Bradesco S.A.</option>
                                                            <option value="341">Banco Itaú S.A.</option>
                                                          

                                                        </select></label>
                                                </div>

                                                <div class="col-sm-2">
                                                    <label>AG. C/ DÍGITO: <input type="text" name="nro_agencia-name" class="solicitation-form__name solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-3">
                                                    <label>CONTA S/ DÍGITO: <input type="text" name="nro_conta" class="solicitation-form__name solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-3">
                                                    <label>Digito Conta: <input type="text" name="dig_conta" class="solicitation-form__name solicitation-input"></label>
                                                </div>



                                                <div class="col-sm-2">
                                                    <label>CONTA TIPO:
                                                        <select id="conta-tipo">
                                                            <option disabled selected>Selecionar</option>
                                                            <option value="CONTA_CORRENTE_INDIVIDUAL">Conta-Corrente</option>
                                                            <option value="CONTA_CORRENTE_INDIVIDUAL">Poupança</option>
                                                        </select></label>
                                                </div>

                                                <div class="col-sm-2">
                                                    <label>CONTA DESDE: <input type="date" name="conta-desde" class="solicitation-form__id solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-7">
                                                    <label>REFERÊNCIA PESSOAL - NOME: <input type="text" name="nome-referencia-pessoal" class="solicitation-form__name solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-5">
                                                    <label>CPF: <input type="text" name="cpf-referencia-pessoal" class="solicitation-form__name solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-7">
                                                    <label>GRAU DE RELACIONAMENTO: <input type="text" name="grau-relacionamento" class="solicitation-form__name solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-5">
                                                    <label>TELEFONE DE CONTATO: <input type="text" name="telefone-relacionamento" class="solicitation-form__name solicitation-input"></label>
                                                </div>

                                            </form>
                                            <!-- fim form -->
                                        </div>

                                        <div class="solicitation-register-btn step_04">
                                            <a href="javascript:void(0);">Continuar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- fim formulário dados bancario -->

                        </div>
                    </div> <!--acordions-->

                </div> <!--solicitation-register__area-->
            </div> <!--row -->
        </div> <!--container -->
    </section>
    <!-- solicitation form-->

</div>

<script src="{{asset('node_modules/jquery-mask-plugin/dist/jquery.mask.js')}}"></script>
{{--<script src="{{asset('assets/index/js/simulacao.js')}}"></script>--}}

<script src="{{asset('node_modules/inputmask/dist/inputmask/inputmask.js')}}"></script>
<script src="{{asset('node_modules/inputmask/dist/inputmask/inputmask.extensions.js')}}"></script>
<script src="{{asset('node_modules/inputmask/dist/inputmask/inputmask.numeric.extensions.js')}}"></script>
<script src="{{asset('node_modules/inputmask/dist/inputmask/inputmask.date.extensions.js')}}"></script>
<script src="{{asset('node_modules/inputmask/dist/inputmask/jquery.inputmask.js')}}"></script>
<script src="{{asset('node_modules/jquery-validation/dist/jquery.validate.js')}}"></script>
<script src="{{asset('js/bootstrap-notify.js')}}"></script>
<script src="{{asset('js/alterar_pedido.js')}}"></script>
<script src="assets/pedido/js/emprestimo.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    $('#form-1 input[name=cpf-conjuge]').mask('000.000.000-00', {reverse: true});
</script>
<style>
    /* Absolute Center Spinner */
    .loading {
        position: fixed;
        z-index: 999;
        height: 2em;
        width: 2em;
        overflow: show;
        margin: auto;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        display: none;
    }

    /* Transparent Overlay */
    .loading:before {
        content: '';
        display: block;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0, .8));

        background: -webkit-radial-gradient(rgba(20, 20, 20,.8), rgba(0, 0, 0,.8));
    }

    /* :not(:required) hides these rules from IE9 and below */
    .loading:not(:required) {
        /* hide "loading..." text */
        font: 0/0 a;
        color: transparent;
        text-shadow: none;
        background-color: transparent;
        border: 0;
    }

    .loading:not(:required):after {
        content: '';
        display: block;
        font-size: 10px;
        width: 1em;
        height: 1em;
        margin-top: -0.5em;
        -webkit-animation: spinner 1500ms infinite linear;
        -moz-animation: spinner 1500ms infinite linear;
        -ms-animation: spinner 1500ms infinite linear;
        -o-animation: spinner 1500ms infinite linear;
        animation: spinner 1500ms infinite linear;
        border-radius: 0.5em;
        -webkit-box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
        box-shadow: rgba(255,255,255, 0.75) 1.5em 0 0 0, rgba(255,255,255, 0.75) 1.1em 1.1em 0 0, rgba(255,255,255, 0.75) 0 1.5em 0 0, rgba(255,255,255, 0.75) -1.1em 1.1em 0 0, rgba(255,255,255, 0.75) -1.5em 0 0 0, rgba(255,255,255, 0.75) -1.1em -1.1em 0 0, rgba(255,255,255, 0.75) 0 -1.5em 0 0, rgba(255,255,255, 0.75) 1.1em -1.1em 0 0;
    }

    /* Animation */

    @-webkit-keyframes spinner {
        0% {
            -webkit-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        100% {
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }
    @-moz-keyframes spinner {
        0% {
            -webkit-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        100% {
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }
    @-o-keyframes spinner {
        0% {
            -webkit-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        100% {
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }
    @keyframes spinner {
        0% {
            -webkit-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        100% {
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }
</style>

<script src="{{asset('js/plentz-jquery-maskmoney-cdbeeac/dist/jquery.maskMoney.js')}}"></script>

<script>
    $('.solicitation-form__phone').mask('(00) 0000-00000');
    $(".salario_nome_input").maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
    $(".valor_patrimonio_input").maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});

</script>
</body>
</html>
