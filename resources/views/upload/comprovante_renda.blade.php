
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
    <link rel="stylesheet" type="text/css"  href="assets/comprovante_residencia/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"  href="assets/comprovante_residencia//css/style.css">
    <link rel="stylesheet" type="text/css"  href="assets/comprovante_residencia//css/style-pedido-emprestimo.css">
    <link rel="stylesheet" type="text/css"  href="assets/comprovante_residencia//css/font-awesome.min.css">

    <!-- SCRIPT -->
    <script src="assets/comprovante_residencia/js/jquery-3.3.1.min.js"></script>
    <script src="assets/comprovante_residencia/js/bootstrap.min.js"></script>

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
                <a class="logomarca" href="#"><img src="assets/comprovante_residencia/images/logo-facilita.png" alt="Logomarca Facilita" class="image-logomarca"/></a>
                <div class="user-logged">
                    <img src="assets/comprovante_residencia/images/icon-user.png" alt="Ícone Usuário" class="icon-user-logged"/>
                    <p class="mr-5" style="color: #fff;">Olá {{Auth::user()->email}}, pedido em andamento!</p>
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

                <div class="col-sm-3 solicitation-header__area">
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

                <div class="col-sm-3 solicitation-header__area solicitation-header__active">
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

                <div class="solicitation-inf-area solicitation-value">
                    <p>Valor da solicitação</p>
                    <span>R$ 2.000,00</span>
                </div>

                <div class="solicitation-inf-area solicitation-payment">
                    <p>Pagamento em</p>
                    <span>12 meses</span>
                </div>

                <div class="solicitation-inf-area">
                    <p>Valor da parcela</p>
                    <span>R$ 601,12</span>
                </div>

                <div class="solicitation-inf-area">
                    <span>TAXA: 4,80% A.M.</span>
                    <span>CET: 6,15% A.M.</span>
                    <a href="#" class="solicitation-inf__alter">Alterar</a>
                </div>

            </div>
        </div>
    </section>
    <!-- solicitation inf-->

    <!-- envio de documento -->
    <section class="solicitation-register">
        <div class="container">
            <div class="row">
                <div class="col-12 solicitation-register__area">

                    <div class="solicitation-accordion">
                        <div id="accordion">

                            <!-- formulário documentos pendentes  -->
                            <div class="acordion-order-dispatched">
                                <div>
                                    <a class="card-link" data-toggle="collapse" href="#form-1">
                                        Envio de documento
                                    </a>
                                </div>

                                <div id="form-1" class="accordion-form collapse show" data-parent="#accordion" enctype="multipart/form-data">

                                    <div class="card-body acordion-photo-document photo-doc-home">
                                        <div class="row">

                                            <div class="col-sm-12 photo-document__item">
                                                <h2>Comprovante de residência</h2>

                                                <div class="box-photo"></div>
                                                <form action="{{route('enviar_arquivo')}}" method="post" enctype="multipart/form-data">

                                                    {{ csrf_field() }}
                                                    <a href="" class="send-photo"><i class="fa fa-folder-open" aria-hidden="true"></i>Selecionar</a>
                                                    <input type="file" class="send-photo" name="image">

                                                    <label>Comprovante está em seu nome?</br>
                                                        <input type="radio" name="nome-no-documento" value="sim" checked> Sim
                                                        <input type="radio" name="nome-no-documento" value="nao"> Não
                                                    </label>

                                                    <input type="hidden" name="tipodoc" value="EXTRATO_FGTS">



                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- fim documentos pendentes  -->
                        </div>
                    </div> <!--acordions-->

                    <div class="solicitation-register-btn">
                        <a href="{{route('pendencias')}}" class="solicitation-back">Voltar</a>
                        {{--<a href="" class="solicitation-next">Continuar</a>--}}
                        <button type="submit" class="solicitation-next">Continuar</button>
                    </div>

                    </form>
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
