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
    <link rel="stylesheet" type="text/css"  href="assets/resumo/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"  href="assets/resumo/css/style.css">
    <link rel="stylesheet" type="text/css"  href="assets/resumo/css/style-pedido-emprestimo.css">
    <link rel="stylesheet" type="text/css"  href="assets/resumo/css/font-awesome.min.css">

    <!-- SCRIPT -->
    <script src="assets/resumo/js/jquery-3.3.1.min.js"></script>
    <script src="assets/resumo/js/bootstrap.min.js"></script>

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
            <div class="header-content">
                <a class="logomarca" href="#"><img src="assets/resumo/images/logo-facilita.png" alt="Logomarca Facilita" class="image-logomarca"/></a>
                <div class="user-logged">
                    <img src="assets/resumo/images/icon-user.png" alt="Ícone Usuário" class="icon-user-logged"/>
                    <p>Olá Maria, pedido em andamento!</p>
                </div>
                <div class="nav">
                    <nav>
                        <ul>
                            <li class="nav-text"><a>Menu<i class="fa fa-caret-down" aria-hidden="true"></i></a></i>
                                <ul class="sub-menu">
                                    <li><a href="#">Meus emprestimos</a></li>
                                    <li class="nav-config"><a href="#">senha</a></li>
                                    <li><a href="#">sair</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="page-content">

    <!-- solicitation header-->
    <section class="solicitation-header">
        <div class="container">
            <div class="row">

                <div class="col-sm-3 solicitation-header__area solicitation-header__checked">
                    <div>
                        <span>1</span>
                        <h2>Faça seu pedido</h2>
                    </div>
                </div>

                <div class="col-sm-3 solicitation-header__area solicitation-header__active">
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
    <section class="solicitation-inf solicitation-sent">
        <div class="container">
            <div class="row">

                <div class="solicitation-inf-area solicitation-date">
                    <p>Data da solicitação</p>
                    <span>07/11/2018</span>
                </div>

                <div class="solicitation-inf-area solicitation-date">
                    <p>Data de pagamento</p>
                    <span>07/11/2018</span>
                </div>

                <div class="solicitation-inf-area solicitation-value">
                    <p>Valor da solicitação</p>
                    <span>R$ 2.000,00</span>
                </div>

                <div class="solicitation-inf-area solicitation-payment">
                    <p>Pagamento em</p>
                    <span>12 meses</span>
                </div>

                <div class="solicitation-inf-area">
                    <p>Motivo</p>
                    <span>Pagar cartão</span>
                    <a href="#" class="solicitation-inf__alter">Alterar</a>
                </div>

            </div>
        </div>
    </section>
    <!-- solicitation inf-->

    <!-- resumo pedido -->
    <section id="order" class="solicitation-register">
        <div class="container">
            <div class="row">
                <div class="col-12 solicitation-register__area">

                    <div class="solicitation-accordion">
                        <div id="accordion">

                            <!-- resumo do pedido  -->
                            <div class="solicitation-accordion-form card">
                                <div>
                                    <a class="card-link" data-toggle="collapse" href="#form-1">
                                        Resumo do pedido
                                    </a>
                                </div>

                                <div id="form-1" class="accordion-form collapse show" data-parent="#accordion">
                                    <div class="card-body">
                                        <h3>Resumo do pedido</h3>

                                        <div class="col-12 order">
                                            <div class="order-item-main order__box">
                                                <div>
                                                    <p>Valor a ser depositado na conta</p>
                                                    <span>R$ {{$valorPrincipal}}</span>
                                                </div>
                                            </div>

                                            <div class="order-item order__box">
                                                <div>
                                                    <p>Taxa de serviço</p>
                                                    <span>R$ {{$valorTC}}</span>
                                                </div>
                                            </div>

                                            <div class="order-item order__box">
                                                <div>
                                                    <p>IOF</p>
                                                    <span>R$ {{$iof}}</span>
                                                </div>
                                            </div>

                                            <div class="order-item order__box">
                                                <div>
                                                    <p>Valor do empréstimo</p>
                                                    <span>R$ {{$valorFinanciado}}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 order order-evaluation">
                                            <div class="order-item-main order__box">
                                                <div>
                                                    <p>Sua avaliação de crédito</p>
                                                    <span> NÃO VEM NA PROPOSTA -> E2</span>
                                                </div>
                                            </div>

                                            <div class="order-item order__box order-item-divisoy">
                                                <div class="order__box-divisoy">
                                                    <p>Sua taxa de juros</p>
                                                </div>
                                                <div class="order__box-divisoy">
                                                    <span>{{$taxaJurosAno}}% A.A.</span>
                                                    <span>{{$taxaJuros}}% A.M.</span>
                                                </div>
                                            </div>

                                            <div class="order-item order__box">
                                                <div class="order__box-divisoy">
                                                    <p>CET</p>
                                                </div>
                                                <div class="order__box-divisoy">
                                                    <span>NÃO VEM NA PROPOSTA -> 104,56% A.A.</span>
                                                    <span>{{$cet}}% A.M.</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 order order-box">
                                            <div class="order-item-main order__box">
                                                <div>
                                                    <p>Valor da parcela</p>
                                                    <span>R$ {{$valorParcela}} / {{$quantidadeParcelas}}</span>
                                                </div>
                                            </div>

                                            <div class="order-item order__box order-item-divisoy">
                                                <div>
                                                    <p>Primeira parcela</p>
                                                    <span>{{ date('d', strtotime(str_replace('-','/', $dataPrimeiraParcela)))}} {{ date('F', strtotime(str_replace('-','/', $dataPrimeiraParcela)))}}</span>
                                                    <span>{{ date('Y', strtotime(str_replace('-','/', $dataPrimeiraParcela)))}}</span>
                                                </div>
                                            </div>

                                            <div class="order-item order__box order-plots">
                                                <div>
                                                    <p>{{$quantidadeParcelas}}</p>
                                                    <span>Parcelas</span>
                                                </div>
                                            </div>

                                            <div class="order-item order__box">
                                                <div>
                                                    <p>Última parcela</p>
                                                    <span>4 NOV</span>
                                                    <span>2019</span>
                                                </div>
                                            </div>
                                        </div>

                                        <p class="order-alert">os vamores apresentados são apenas uma referência, podem sofrer alterações sem aviso prévio</p>
                                        <p class="order-alert order-alert-alter">você pode alterar o número de pacelas, o valor do empréstimo e a data de vencimento clicando em "alterar pedido"</p>

                                        <div class="solicitation-register-btn">
                                            <a href="">Continuar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- fim resumo pedido -->

                        </div>
                    </div> <!--acordions-->

                </div>
            </div> <!--row -->
        </div> <!--container -->
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p>©Facilita 2016 - Todos os direitos reservados - FACILITA CRÉDITO PESSOAL CNPJ:29.228.121/0001-77</br>
                        Correspondente Bancário das instituições financeiras: Banco CBSS S.A. CNPJ: 27.098.060/0001-45 </br>
                        Telefone: (11) 9999-9999</p>
                </div>
            </div>
        </div>
    </footer>


</div>
</body>
</html>
