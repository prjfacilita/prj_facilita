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
    <link rel="stylesheet" type="text/css"  href="assets/pedido/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"  href="assets/pedido/css/style.css">
    <link rel="stylesheet" type="text/css"  href="assets/pedido/css/style-pedido-emprestimo.css">
    <link rel="stylesheet" type="text/css"  href="assets/pedido/css/font-awesome.min.css">

    <!-- SCRIPT -->
    <script src="assets/pedido/js/jquery-3.3.1.min.js"></script>
    <script src="assets/pedido/js/bootstrap.min.js"></script>

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
                <p>Olá Maria, seja bem vinda!</p>
            </div>


            <ul class="dropdown-menu" role="menu">
                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
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

                <div class="col-sm-3 solicitation-inf-area solicitation-date">
                    <p>Data da solicitação</p>
                    <span>07/11/2018</span>
                </div>

                <div class="col-sm-3 solicitation-inf-area solicitation-value">
                    <p>Valor da solicitação</p>
                    <span>R$ 2.000,00</span>
                </div>

                <div class="col-sm-3 solicitation-inf-area solicitation-payment">
                    <p>Pagamento em</p>
                    <span>12 meses</span>
                </div>

                <div class="col-sm-3 solicitation-inf-area solicitation-reason">
                    <p>Motivo</p>
                    <span>Pagar cartão</span>

                    <a href="#" class="solicitation-inf__alter">Alterar</a>
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

                    <div class="solicitation-accordion">
                        <div id="accordion">

                            <!-- formulário de dados pessoais -->
                            <div class="solicitation-accordion-form card">
                                <div>
                                    <a class="card-link" data-toggle="collapse" href="#form-1">
                                        Dados Pessoais
                                    </a>
                                </div>

                                <div id="form-1" class="accordion-form collapse show" data-parent="#accordion">
                                    <div class="card-body">
                                        <h3>Dados Pessoais</h3>
                                        <div class="solicitation-register__form">

                                            <!-- inicio form -->
                                            <form action="" method="post">
                                                <div class="col-sm-8">
                                                    <label>Nome: <input type="text" name="solicitation-name" class="solicitation-form__name solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label>Nascimento: <input type="date" name="solicitation-birth" class="solicitation-form__birth solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-3">
                                                    <label>RG: <input type="text" name="solicitation-id" class="solicitation-form__id solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-3">
                                                    <label>Data de Emissão: <input type="date" name="solicitation-emission-id" class="solicitation-form__id solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-3">
                                                    <label>Orgão Expedidor: <input type="text" name="solicitation-organ" class="solicitation-form__id solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-3">
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

                                                <div class="col-sm-4">
                                                    <label>Sexo:
                                                        <select id="sexo">
                                                            <option disabled selected>Selecionar</option>
                                                            <option value="feminino">Feminino</option>
                                                            <option value="masculino">Masculino</option>
                                                        </select></label>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label>Estado Civil:
                                                        <select id="estado-civil">
                                                            <option disabled selected>Selecionar</option>
                                                            <option value="casada">Casada</option>
                                                            <option value="solteira">Solteira</option>
                                                            <option value="divorciada">Divorciada</option>
                                                            <option value="viuva">Viúva</option>
                                                            <option value="uniao-estavel">União Estável</option>
                                                        </select></label>
                                                </div>



                                                <div class="col-sm-4">
                                                    <label>Nacionalidade: <input type="nacionalidade" name="solicitation-phone" class="solicitation-form__phone solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label>Telefone: <input type="tel" name="solicitation-phone" class="solicitation-form__phone solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label>Celular: <input type="tel" name="solicitation-cellphone" class="solicitation-form__phone solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label>Telefone p/ Recado: <input type="tel" name="solicitation-phone-message" class="solicitation-form__phone solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-8">
                                                    <label>Nome da mãe<input type="text" name="solicitation-name-mother" class="solicitation-form__name solicitation-input"></label>
                                                </div>
                                            </form>
                                            <!-- fim form -->
                                        </div>

                                        <div class="solicitation-register-btn">
                                            <a href="">Continuar</a>
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
                                        <form action="" method="post">
                                                <div class="col-sm-2">
                                                    <label>Salário: <input type="text" name="salario-name" class="solicitation-form__name solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-5">
                                                    <label>Ocupação:
                                                        <select id="ocupacao-id">
                                                            <option disabled selected>Selecionar</option>
                                                            <option value="empregado_setor_privado">EMPREGADO SETOR PRIVADO</option>
                                                            <option value="empregado_setor_publico">EMPREGADO SETOR PÚBLICO</option>
                                                            <option value="profissional_liberal">PROFISSIONAL LIBERAL</option>
                                                            <option value="empresario">EMPRESÁRIO</option>
                                                            <option value="aposentado_ou_pensionista">APOSENTADO OU PENSIONISTA</option>
                                                            <option value="autonomo">AUTÔNOMO</option>
                                                            <option value="outros">OUTROS</option>
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
                                                    <label>Profissão: <input type="text" name="profissao-emission-id" class="solicitation-form__id solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-6">
                                                    <label>Cargo: <input type="text" name="cargo-emission-id" class="solicitation-form__id solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-8">
                                                    <label>Endereço Comercial: <input type="endereco_comercial" name="solicitation-phone" class="solicitation-form__phone solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-2">
                                                    <label>Nro: <input type="endereco_comercial_nro" name="solicitation-cellphone" class="solicitation-form__phone solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-2">
                                                    <label>CEP: <input type="endereco_comercial_cep" name="solicitation-phone-message" class="solicitation-form__phone solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-5">
                                                    <label>Bairro: <input type="endereco_comercial_bairro" name="solicitation-phone-message" class="solicitation-form__phone solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-5">
                                                    <label>Cidade: <input type="endereco_comercial_cidade" name="solicitation-phone-message" class="solicitation-form__phone solicitation-input"></label>
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
                                            </form>
                                            <!-- fim form -->
                                        </div>

                                        <div class="solicitation-register-btn">
                                            <a href="">Continuar</a>
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
                            <form action="" method="post">

                                                <div class="col-sm-2">
                                                    <label>CEP: <input type="cep" name="solicitation-phone-message" class="solicitation-form__phone solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-8">
                                                    <label>Endereço: <input type="endereco" name="solicitation-phone" class="solicitation-form__phone solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-2">
                                                    <label>Nro: <input type="nro" name="solicitation-cellphone" class="solicitation-form__phone solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-6">
                                                    <label>Complemento: <input type="complemento" name="solicitation-phone-message" class="solicitation-form__phone solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-6">
                                                    <label>Bairro: <input type="bairro" name="solicitation-phone-message" class="solicitation-form__phone solicitation-input"></label>
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
                                                    <label>Cidade: <input type="cidade" name="solicitation-phone-message" class="solicitation-form__phone solicitation-input"></label>
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
                                                    <label>Valor do Patrimônio: <input type="text" name="valor-patrimonio-name" class="solicitation-form__name solicitation-input"></label>
                                                </div>




                                            </form>
                                            <!-- fim form -->
                                        </div>

                                        <div class="solicitation-register-btn">
                                            <a href="">Continuar</a>
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
                                        <h3>Dados bancários</h3>
                                        <div class="solicitation-register__form">

                                            <!-- inicio form -->
                                            <form action="" method="post">

                                            <div class="col-sm-5">
                                                    <label>Banco:
                                                        <select id="banco-id">
                                                            <option disabled selected>Selecionar</option>
                                                            <option value="654">654 Banco A.J.Renner S.A.</option>
                                                            <option value="246">246 Banco ABC Brasil S.A.</option>
                                                            <option value="25">25 Banco Alfa S.A.</option>
                                                            <option value="641">641 Banco Alvorada S.A.</option>
                                                            <option value="213">213 Banco Arbi S.A.</option>
                                                            <option value="19">19 Banco Azteca do Brasil S.A.</option>
                                                            <option value="29">29 Banco Banerj S.A.</option>
                                                            <option value="0">0 Banco Bankpar S.A.</option>
                                                            <option value="740">740 Banco Barclays S.A.</option>
                                                            <option value="107">107 Banco BBM S.A.</option>
                                                            <option value="31">31 Banco Beg S.A.</option>
                                                            <option value="739">739 Banco BGN S.A.</option>
                                                            <option value="96">96 Banco BM&F de Serviços de Liquidação e Custódia S.A</option>
                                                            <option value="318">318 Banco BMG S.A.</option>
                                                            <option value="752">752 Banco BNP Paribas Brasil S.A.</option>
                                                            <option value="248">248 Banco Boavista Interatlântico S.A.</option>
                                                            <option value="218">218 Banco Bonsucesso S.A.</option>
                                                            <option value="65">65 Banco Bracce S.A.</option>
                                                            <option value="36">36 Banco Bradesco BBI S.A.</option>
                                                            <option value="204">204 Banco Bradesco Cartões S.A.</option>
                                                            <option value="394">394 Banco Bradesco Financiamentos S.A.</option>
                                                            <option value="237">237 Banco Bradesco S.A.</option>
                                                            <option value="225">225 Banco Brascan S.A.</option>
                                                            <option value="M15">M15 Banco BRJ S.A.</option>
                                                            <option value="208">208 Banco BTG Pactual S.A.</option>
                                                            <option value="44">44 Banco BVA S.A.</option>
                                                            <option value="263">263 Banco Cacique S.A.</option>
                                                            <option value="473">473 Banco Caixa Geral - Brasil S.A.</option>
                                                            <option value="412">412 Banco Capital S.A.</option>
                                                            <option value="40">40 Banco Cargill S.A.</option>
                                                            <option value="745">745 Banco Citibank S.A.</option>
                                                            <option value="M08">M08 Banco Citicard S.A.</option>
                                                            <option value="241">241 Banco Clássico S.A.</option>
                                                            <option value="M19">M19 Banco CNH Capital S.A.</option>
                                                            <option value="215">215 Banco Comercial e de Investimento Sudameris S.A.</option>
                                                            <option value="756">756 Banco Cooperativo do Brasil S.A. - BANCOOB</option>
                                                            <option value="748">748 Banco Cooperativo Sicredi S.A.</option>
                                                            <option value="75">75 Banco CR2 S.A.</option>
                                                            <option value="721">721 Banco Credibel S.A.</option>
                                                            <option value="222">222 Banco Credit Agricole Brasil S.A.</option>
                                                            <option value="505">505 Banco Credit Suisse (Brasil) S.A.</option>
                                                            <option value="229">229 Banco Cruzeiro do Sul S.A.</option>
                                                            <option value="266">266 Banco Cédula S.A.</option>
                                                            <option value="3">3 Banco da Amazônia S.A.</option>
                                                            <option value="083-3">083-3 Banco da China Brasil S.A.</option>
                                                            <option value="M21">M21 Banco Daimlerchrysler S.A.</option>
                                                            <option value="707">707 Banco Daycoval S.A.</option>
                                                            <option value="300">300 Banco de La Nacion Argentina</option>
                                                            <option value="495">495 Banco de La Provincia de Buenos Aires</option>
                                                            <option value="494">494 Banco de La Republica Oriental del Uruguay</option>
                                                            <option value="M06">M06 Banco de Lage Landen Brasil S.A.</option>
                                                            <option value="24">24 Banco de Pernambuco S.A. - BANDEPE</option>
                                                            <option value="456">456 Banco de Tokyo-Mitsubishi UFJ Brasil S.A.</option>
                                                            <option value="214">214 Banco Dibens S.A.</option>
                                                            <option value="1">1 Banco do Brasil S.A.</option>
                                                            <option value="47">47 Banco do Estado de Sergipe S.A.</option>
                                                            <option value="37">37 Banco do Estado do Pará S.A.</option>
                                                            <option value="39">39 Banco do Estado do Piauí S.A. - BEP</option>
                                                            <option value="41">41 Banco do Estado do Rio Grande do Sul S.A.</option>
                                                            <option value="4">4 Banco do Nordeste do Brasil S.A.</option>
                                                            <option value="265">265 Banco Fator S.A.</option>
                                                            <option value="M03">M03 Banco Fiat S.A.</option>
                                                            <option value="224">224 Banco Fibra S.A.</option>
                                                            <option value="626">626 Banco Ficsa S.A.</option>
                                                            <option value="M18">M18 Banco Ford S.A.</option>
                                                            <option value="233">233 Banco GE Capital S.A.</option>
                                                            <option value="734">734 Banco Gerdau S.A.</option>
                                                            <option value="M07">M07 Banco GMAC S.A.</option>
                                                            <option value="612">612 Banco Guanabara S.A.</option>
                                                            <option value="M22">M22 Banco Honda S.A.</option>
                                                            <option value="63">63 Banco Ibi S.A. Banco Múltiplo</option>
                                                            <option value="M11">M11 Banco IBM S.A.</option>
                                                            <option value="604">604 Banco Industrial do Brasil S.A.</option>
                                                            <option value="320">320 Banco Industrial e Comercial S.A.</option>
                                                            <option value="653">653 Banco Indusval S.A.</option>
                                                            <option value="630">630 Banco Intercap S.A.</option>
                                                            <option value="077-9">077-9 Banco Intermedium S.A.</option>
                                                            <option value="249">249 Banco Investcred Unibanco S.A.</option>
                                                            <option value="M09">M09 Banco Itaucred Financiamentos S.A.</option>
                                                            <option value="184">184 Banco Itaú BBA S.A.</option>
                                                            <option value="479">479 Banco ItaúBank S.A</option>
                                                            <option value="376">376 Banco J. P. Morgan S.A.</option>
                                                            <option value="74">74 Banco J. Safra S.A.</option>
                                                            <option value="217">217 Banco John Deere S.A.</option>
                                                            <option value="76">76 Banco KDB S.A.</option>
                                                            <option value="757">757 Banco KEB do Brasil S.A.</option>
                                                            <option value="600">600 Banco Luso Brasileiro S.A.</option>
                                                            <option value="212">212 Banco Matone S.A.</option>
                                                            <option value="M12">M12 Banco Maxinvest S.A.</option>
                                                            <option value="389">389 Banco Mercantil do Brasil S.A.</option>
                                                            <option value="746">746 Banco Modal S.A.</option>
                                                            <option value="M10">M10 Banco Moneo S.A.</option>
                                                            <option value="738">738 Banco Morada S.A.</option>
                                                            <option value="66">66 Banco Morgan Stanley S.A.</option>
                                                            <option value="243">243 Banco Máxima S.A.</option>
                                                            <option value="45">45 Banco Opportunity S.A.</option>
                                                            <option value="M17">M17 Banco Ourinvest S.A.</option>
                                                            <option value="623">623 Banco Panamericano S.A.</option>
                                                            <option value="611">611 Banco Paulista S.A.</option>
                                                            <option value="613">613 Banco Pecúnia S.A.</option>
                                                            <option value="094-2">094-2 Banco Petra S.A.</option>
                                                            <option value="643">643 Banco Pine S.A.</option>
                                                            <option value="724">724 Banco Porto Seguro S.A.</option>
                                                            <option value="735">735 Banco Pottencial S.A.</option>
                                                            <option value="638">638 Banco Prosper S.A.</option>
                                                            <option value="M24">M24 Banco PSA Finance Brasil S.A.</option>
                                                            <option value="747">747 Banco Rabobank International Brasil S.A.</option>
                                                            <option value="088-4">088-4 Banco Randon S.A.</option>
                                                            <option value="356">356 Banco Real S.A.</option>
                                                            <option value="633">633 Banco Rendimento S.A.</option>
                                                            <option value="741">741 Banco Ribeirão Preto S.A.</option>
                                                            <option value="M16">M16 Banco Rodobens S.A.</option>
                                                            <option value="72">72 Banco Rural Mais S.A.</option>
                                                            <option value="453">453 Banco Rural S.A.</option>
                                                            <option value="422">422 Banco Safra S.A.</option>
                                                            <option value="33">33 Banco Santander (Brasil) S.A.</option>
                                                            <option value="250">250 Banco Schahin S.A.</option>
                                                            <option value="743">743 Banco Semear S.A.</option>
                                                            <option value="749">749 Banco Simples S.A.</option>
                                                            <option value="366">366 Banco Société Générale Brasil S.A.</option>
                                                            <option value="637">637 Banco Sofisa S.A.</option>
                                                            <option value="12">12 Banco Standard de Investimentos S.A.</option>
                                                            <option value="464">464 Banco Sumitomo Mitsui Brasileiro S.A.</option>
                                                            <option value="082-5">082-5 Banco Topázio S.A.</option>
                                                            <option value="M20">M20 Banco Toyota do Brasil S.A.</option>
                                                            <option value="M13">M13 Banco Tricury S.A.</option>
                                                            <option value="634">634 Banco Triângulo S.A.</option>
                                                            <option value="M14">M14 Banco Volkswagen S.A.</option>
                                                            <option value="M23">M23 Banco Volvo (Brasil) S.A.</option>
                                                            <option value="655">655 Banco Votorantim S.A.</option>
                                                            <option value="610">610 Banco VR S.A.</option>
                                                            <option value="370">370 Banco WestLB do Brasil S.A.</option>
                                                            <option value="21">21 BANESTES S.A. Banco do Estado do Espírito Santo</option>
                                                            <option value="719">719 Banif-Banco Internacional do Funchal (Brasil)S.A.</option>
                                                            <option value="755">755 Bank of America Merrill Lynch Banco Múltiplo S.A.</option>
                                                            <option value="744">744 BankBoston N.A.</option>
                                                            <option value="73">73 BB Banco Popular do Brasil S.A.</option>
                                                            <option value="78">78 BES Investimento do Brasil S.A.-Banco de Investimento</option>
                                                            <option value="69">69 BPN Brasil Banco Múltiplo S.A.</option>
                                                            <option value="70">70 BRB - Banco de Brasília S.A.</option>
                                                            <option value="092-2">092-2 Brickell S.A. Crédito, financiamento e Investimento</option>
                                                            <option value="104">104 Caixa Econômica Federal</option>
                                                            <option value="477">477 Citibank N.A.</option>
                                                            <option value="081-7">081-7 Concórdia Banco S.A.</option>
                                                            <option value="097-3">097-3 Cooperativa Central de Crédito Noroeste Brasileiro Ltda.</option>
                                                            <option value="085-x">085-x Cooperativa Central de Crédito Urbano-CECRED</option>
                                                            <option value="099-x">099-x Cooperativa Central de Economia e Credito Mutuo das Unicreds</option>
                                                            <option value="090-2">090-2 Cooperativa Central de Economia e Crédito Mutuo das Unicreds</option>
                                                            <option value="089-2">089-2 Cooperativa de Crédito Rural da Região de Mogiana</option>
                                                            <option value="087-6">087-6 Cooperativa Unicred Central Santa Catarina</option>
                                                            <option value="098-1">098-1 Credicorol Cooperativa de Crédito Rural</option>
                                                            <option value="487">487 Deutsche Bank S.A. - Banco Alemão</option>
                                                            <option value="751">751 Dresdner Bank Brasil S.A. - Banco Múltiplo</option>
                                                            <option value="64">64 Goldman Sachs do Brasil Banco Múltiplo S.A.</option>
                                                            <option value="62">62 Hipercard Banco Múltiplo S.A.</option>
                                                            <option value="399">399 HSBC Bank Brasil S.A. - Banco Múltiplo</option>
                                                            <option value="168">168 HSBC Finance (Brasil) S.A. - Banco Múltiplo</option>
                                                            <option value="492">492 ING Bank N.V.</option>
                                                            <option value="652">652 Itaú Unibanco Holding S.A.</option>
                                                            <option value="341">341 Itaú Unibanco S.A.</option>
                                                            <option value="79">79 JBS Banco S.A.</option>
                                                            <option value="488">488 JPMorgan Chase Bank</option>
                                                            <option value="14">14 Natixis Brasil S.A. Banco Múltiplo</option>
                                                            <option value="753">753 NBC Bank Brasil S.A. - Banco Múltiplo</option>
                                                            <option value="086-8">086-8 OBOE Crédito Financiamento e Investimento S.A.</option>
                                                            <option value="254">254 Paraná Banco S.A.</option>
                                                            <option value="409">409 UNIBANCO - União de Bancos Brasileiros S.A.</option>
                                                            <option value="230">230 Unicard Banco Múltiplo S.A.</option>
                                                            <option value="091-4">091-4 Unicred Central do Rio Grande do Sul</option>
                                                            <option value="84">84 Unicred Norte do Paraná</option>


                                                        </select></label>
                                                </div>

                                                <div class="col-sm-3">
                                                    <label>Nro. AGÊNCIA: <input type="text" name="nro_agencia-name" class="solicitation-form__name solicitation-input"></label>
                                                </div>

                                                <div class="col-sm-4">
                                                    <label>CONTA: <input type="text" name="conta-name" class="solicitation-form__name solicitation-input"></label>
                                                </div>


                                            </form>
                                            <!-- fim form -->
                                        </div>

                                        <div class="solicitation-register-btn">
                                            <a href="">Continuar</a>
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
</body>
</html>  
