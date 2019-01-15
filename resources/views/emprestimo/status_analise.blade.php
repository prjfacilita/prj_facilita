<!doctype html>
<html lang="pt-BR">
<head>
    <title>Facillita</title>
    <!-- Required meta tags -->
    <meta name="description" content="Você sempre em dia">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css"  href="assets/analise/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"  href="assets/analise/css/style.css">
    {{--<link rel="stylesheet" type="text/css"  href="assets/analise/css/style-pedido-emprestimo.css">--}}
    <link rel="stylesheet" type="text/css"  href="assets/analise/css/font-awesome.min.css">
    {{--<link rel="stylesheet" type="text/css"  href="assets/analise/css/loading.css">--}}
    <link rel="stylesheet" type="text/css"  href="assets/analise/css/style-emprestimo-negado.css">

    <!-- SCRIPT -->
    <script src="assets/analise/js/jquery-3.3.1.min.js"></script>
    <script src="assets/analise/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        var APP_URL = {!! json_encode(url('/')) !!}
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
            <div class="header-content">
                <a class="logomarca" href="#"><img src="assets/analise/images/logo-facilita.png" alt="Logomarca Facilita" class="image-logomarca"/></a>
                <div class="user-logged">
                    {{--<img src="assets/analise/images/icon-user.png" alt="Ícone Usuário" class="icon-user-logged"/>--}}
                    {{--<p>Olá Maria, pedido em andamento!</p>--}}
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
    </div>
</header>


<div class="page-content">

    <!-- USUARIO  -->
    <section id="user">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="user-name">
                        <img src="assets/analise/images/icon-user.png" alt="Ícone Usuário" class="icon-user"/>
                        <p>{{Auth::user()->email}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- pedido negado  -->
    <section id="request-denied">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <div class="request-denied-message">
                        <p>Aguarde enquanto nossos especialistas análisam seu pedido de emprestimo @foreach($status as $field) {{$field->tipo}} @endforeach</p>
                        {{--<p>Lembramos que a Facilita não solicita nenhum valor antecipado, portanto, desconfie de ofertas desse tipo, mesmo que sejam feitas em nome da Facilita.</p>--}}
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-12">
                    {{--<div class="request-denied-motive">--}}
                        {{--<h2>Entenda porque</h2>--}}

                        {{--<!-- acordions   -->--}}
                        {{--<div id="accordion">--}}
                            {{--<!-- acordion 1 -->--}}
                            {{--<div class="card">--}}
                                {{--<div>--}}
                                    {{--<a class="card-link collapsed" data-toggle="collapse" href="#div-1">Histórico de pagamento</a>--}}
                                {{--</div>--}}

                                {{--<div id="div-1" class="accordion-form collapse" data-parent="#accordion">--}}
                                    {{--<div class="card-body">--}}
                                        {{--<p>Pagar as suas dívidas em dia é necessário para garantir que voçê tenha uma boa linha de crédito. Por isso,--}}
                                            {{--não estar negativado é muito importante.--}}
                                        {{--</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<!-- acordion 2 -->--}}
                            {{--<div class="card">--}}
                                {{--<div>--}}
                                    {{--<a class="card-link collapsed" data-toggle="collapse" href="#div-2">Renda mensal</a>--}}
                                {{--</div>--}}

                                {{--<div id="div-2" class="accordion-form collapse" data-parent="#accordion">--}}
                                    {{--<div class="card-body">--}}
                                        {{--<p>Um empréstimo deve ser planejado de acordo com seus ganhos e despesas. Comprometer mais do que 30% da sua renda com o valor--}}
                                            {{--das parcelas do seu empréstimo não é saudável e pode se tornar um problema a mais na hora de quitar as suas dívidas.--}}
                                        {{--</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<!-- acordion 3 -->--}}
                            {{--<div class="card">--}}
                                {{--<div>--}}
                                    {{--<a class="card-link collapsed" data-toggle="collapse" href="#div-3">dados de cadastro</a>--}}
                                {{--</div>--}}

                                {{--<div id="div-3" class="accordion-form collapse" data-parent="#accordion">--}}
                                    {{--<div class="card-body">--}}
                                        {{--<p>A Facilita precisa dos seus dados para garantir segurança ao seu pedido e conhecer mais sobre você.--}}
                                            {{--Por isso, é fundamental que eles estejam corretos.</p>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}


                        {{--</div>--}}
                        <!-- fim acordions -->

                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- FOOTER  -->
    <footer>
        <div class="footer-content">
            <div class="container">

                <div class="row">
                    <div class="col-12 footer-logo">
                        <a class="logomarca" href="#"><img src="assets/analise/images/logo-facilita.png" alt="Logomarca Facilita" class="image-logomarca"/></a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <p>Somos um correspondente bancário. A FACILITA é uma empresa fundada em 2016 em São Paulo com o objetivo de
                            proporcionar acesso a crédito pessoal,
                            serviços e informações online de forma fácil e descomplicada.
                        </p>
                    </div>
                    <div class="col-sm-6">
                        <ul>
                            <li><a href="">Termos e condições</a></li>
                            <li><a href="">FAQ</a></li>
                            <li><a href="">Política de privacidade</a></li>
                        </ul>
                        <a href="#" class="footer-email">atendimento@facilitaapp.com.br</a>
                        <div class="footer-social">
                            <a href="#" target="_blank"><img src="assets/analise/images/svg/icone-facebook.svg"></a>
                            <a href="#" target="_blank"><img src="assets/analise/images/svg/icone-instagram.svg"></a>
                            <a href="#" target="_blank"><img src="assets/analise/images/svg/icone-linkedin.svg"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p>2018 © Todos os direitos reservados.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</div>
</body>
</html>  
