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
                                                            <option value="mg">MG</option>
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
                                                    <label>Nacionalidade:
                                                        <select id="pais">
                                                            <option disabled selected>Selecionar</option>
                                                            <option value="brasil">Brasil</option>
                                                        </select></label>
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
                                                ESPAÇO PARA FORMULARIO
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
                                                ESPAÇO PARA FORMULARIO
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
                                                ESPAÇO PARA FORMULARIO
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
