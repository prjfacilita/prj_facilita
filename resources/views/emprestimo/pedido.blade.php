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
                                                            <option value="237">237 BRADESCO</option>
                                                            <option value="341">341 ITAÚ</option>

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
