<!doctype html>
<html lang="pt-BR">
<head>
    <title>Facillita</title>
    <!-- Required meta tags -->
    <meta name="description" content="Você sempre em dia">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    {{--<link rel="icon" href="/favicon.ico" type="image/x-icon">--}}

    <!-- CSS -->


    <link rel="stylesheet" type="text/css"  href="{{ asset('assets/index/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('assets/index/css/style.css') }}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('assets/index/css/style-home.css') }}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('assets/index/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('assets/index/slider/slick.css') }}">

    <!-- SCRIPT -->
    <script src="{{ asset('assets/index/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/index/slider/slick.min.js') }}"></script>
    <script src="{{ asset('assets/index/js/bootstrap.min.js') }}"></script>

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/index/css/fonts.css') }}">

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

<header id="home">
    <div class="container">
        <div class="row">
            <div class="header-content">

                <div class="col-sm-6">
                    <a class="logomarca" href="#"><img src="{{ asset('assets/index/images/logo-facilita.png') }}" alt="Logomarca Facilita" class="image-logomarca"/></a>
                </div>

                <div class="col-sm-6">
                    <div class="nav">
                        <nav>
                            <ul>
                                <li><a href="#">Saiba mais</a></li>
                                <li><a href="{{route('register')}}">Criar conta</a></li>
                                <li class="nav-leave"><a href="{{route('login')}}">Entrar</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>

<div class="page-content">

    <!-- BANNER -->
    <section id="banner">
        <div class="container">
            <div class="row">

                <div class="col-sm-8 banner__text">
                    <div>
                        <h1>Crédito para você superar os obstaculos do dia-a-dia!</h1>
                        <p>Valores de 1 a 20 mil reais</p>
                        <p>Taxas entre 3,99% a 12,49 ao mês</p>
                        <p>Prazo de 3 a 24 meses</p>
                    </div>
                </div>



                <div class="col-sm-4 banner__simulation simulation-value">
                    <div class="simulation-box">


                        {{--<div class="part1">--}}
                        <h2 class="pt1">Quanto você precisa</h2>
                        <form class="pt1" id="part-1-simulation" id="pt1" name="part-1-simulation" >

                            {{--<a class="simulation-box__value">R$ 1.000,00</a>--}}
                            <input type="radio" name="simulation-value" id="simulation-value" data-value="100000" value="1000.00" class="simulation-box__value" data-line="R$ 1.000,00">
                            <input type="radio" name="simulation-value" id="simulation-value" data-value="500000" value="5000.00" class="simulation-box__value" data-line="R$ 5.000,00">
                            <input type="radio" name="simulation-value" id="simulation-value" data-value="1000000" value="10000.00" class="simulation-box__value" data-line="R$ 10.000,00">
                            <input type="radio" name="simulation-value" id="simulation-value" data-value="1500000" value="15000.00" class="simulation-box__value" data-line="R$ 15.000,00">
                            <input type="radio" name="simulation-value" id="simulation-value" data-value="2000000" value="20000.00" class="simulation-box__value" data-line="R$ 20.000,00">
                            <input type="text"  id="simulation-other-value" name="simulation-other-value" placeholder="Outro valor" class="simulation-other-value" >

                            {{--<div class="simulation-button"><input type="button" value="Simule agora" class="simulation-box__submit" /></div>--}}
                        </form>



                        {{--SEGUNDA PARTE DA SIMULAÇÃO--}}

                        <h2 style="display: none;" class="pt2">Valor selecionado</h2>
                        <p style="display: none;" class="pt2">R$5.000,00</p>
                        <form style="display: none;" id="pt2" class="pt2">
                            <span class="plots">Em quantas parcelas?</span>
                            <input type="radio" name="simulation-plots" value="24" class="simulation-item" data-line="24">
                            <input type="radio" name="simulation-plots" value="20" class="simulation-item" data-line="20">
                            <input type="radio" name="simulation-plots" value="18" class="simulation-item" data-line="18">
                            <input type="radio" name="simulation-plots" value="12" class="simulation-item" data-line="12">
                            <input type="radio" name="simulation-plots" value="06" class="simulation-item" data-line="06">
                            <input type="radio" name="simulation-plots" value="03" class="simulation-item" data-line="03">

                            {{--<div class="simulation-button"><input type="button" value="Simule agora" class="simulation-box__submit" /></div>--}}
                        </form>


                        {{-- TERCEIRA PARTE DA SIMULAÇÃO --}}



                        {{--QUARTA PARTE DA SIMULAÇÃO--}}

                        {{--<h2 style="display: none;" class="pt4">Melhor dia para pagamento</h2>--}}
                        {{--<form style="display: none;"  id="pt4" class="pt4" >--}}
                            {{--<meta name="csrf-token" content=" {{ csrf_field() }}">--}}
                            {{--<input type="radio" name="simulation-day" value="05" class="simulation-box__day" data-line="05">--}}
                            {{--<input type="radio" name="simulation-day" value="07" class="simulation-box__day" data-line="07">--}}
                            {{--<input type="radio" name="simulation-day" value="10" class="simulation-box__day" data-line="10">--}}
                            {{--<input type="radio" name="simulation-day" value="15" class="simulation-box__day" data-line="15">--}}
                            {{--<input type="radio" name="simulation-day" value="20" class="simulation-box__day" data-line="20">--}}
                            {{--<input type="radio" name="simulation-day" value="30" class="simulation-box__day" data-line="30">--}}

                            {{--<span class="simulation-other-day pt4">--}}
                                {{--<label class="">Escolher outro:</label>--}}
                                  {{--<input type="text" name="simulation-other-day " placeholder="Digite a melhor data">--}}
                                            {{--</label>--}}
                              {{--</span>--}}

                            {{--<div class="simulation-button"><input type="button" value="Simule agora" class="simulation-box__submit simular_agora" /></div>--}}
                        {{--</form>--}}

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- COMO FUNCIONA  -->
    <section id="phases">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <h2>Como funciona?</h2>
                </div>
            </div>

            <div class="row">

                <div class="col-sm-3  phases-item">
                    <img src="assets/index/images/svg/icone-seta.svg">
                    <p><span>1.</span> Você define o valor e a quantidade de parcelas do seu empréstimo pessoal online, a partir de 1.000 até 20.000 em até 24 parcelas.</p>
                </div>

                <div class="col-sm-3  phases-item">
                    <img src="assets/index/images/svg/icone-cadastro.svg">
                    <p><span>2.</span> Envie seu dados cadastrais de forma segura e rápida.</p>
                </div>

                <div class="col-sm-3  phases-item">
                    <img src="assets/index/images/svg/icone-banco.svg">
                    <p><span>3.</span> Seu pedido de empréstimo pessoal é enviado para avaliação da instituição financeira.</p>
                </div>

                <div class="col-sm-3  phases-item">
                    <img src="assets/index/images/svg/icone-cifrao.svg">
                    <p><span>4.</span> O dinheiro do seu crédito pessoal online é depositado diretamente na sua conta bancária em poucas horas após a aprovação.</p>
                </div>

            </div>

        </div>
    </section>

    <!-- VANTAGENS -->
    <section id="benefits">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <h2>Vantagens</h2>
                </div>
            </div>

            <div class="row">

                <div class="col-sm-4 benefits-item">
                    <img src="assets/index/images/svg/icone-relogio.svg">
                    <h3>Rápido, prático e seguro</h3>
                    <p>O dinheiro cai na sua conta em até 24 horas após aprovação.</p>
                </div>

                <div class="col-sm-4 benefits-item">
                    <img src="assets/index/images/svg/icone-dinheiro.svg">
                    <h3>Solução para seus problemas</h3>
                    <p>Você simula o valor na hora e escolhe a parcela que cabe no seu bolso.</p>
                </div>

                <div class="col-sm-4 benefits-item">
                    <img src="assets/index/images/svg/icone-juros.svg">
                    <h3>Juros mais baratos</h3>
                    <p>Combinamos a melhor taxa para seu perfil, diminuindo os juros e aumentando suas chances de aprovação.</p>
                </div>

            </div>

        </div>
    </section>

    <!-- RECOMENDAÇÕES -->
    <section id="testimony">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <h2>Nossos clientes recomendam!!</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-12">

                    <div class="slider-nav testimony-images">
                        <img src="assets/index/images/selfie.jpg">
                        <img src="assets/index/images/selfie2.jpg">
                        <img src="assets/index/images/selfie3.jpg">
                        <img src="assets/index/images/selfie.jpg">
                    </div>

                    <div class="slider-for">
                        <div class="testimony-text">
                            <h3>Victor Moraes</h3>
                            <p>Adorei e super-recomendo! Eu recebi o dinheiro na minha conta em questão de horas.</p>
                        </div>

                        <div class="testimony-text">
                            <h3>Nome 2</h3>
                            <p>Adorei e super-recomendo! Eu recebi o dinheiro na minha conta em questão de horas.</p>
                        </div>

                        <div class="testimony-text">
                            <h3>Nome 3</h3>
                            <p>Adorei e super-recomendo! Eu recebi o dinheiro na minha conta em questão de horas.</p>
                        </div>

                        <div class="testimony-text">
                            <h3>Nome 4</h3>
                            <p>Adorei e super-recomendo! Eu recebi o dinheiro na minha conta em questão de horas.</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

    <footer>
        <div class="footer-content">
            <div class="container">

                <div class="row">
                    <div class="col-12 footer-logo">
                        <a class="logomarca" href="#"><img src="assets/index/images/logo-facilita.png" alt="Logomarca Facilita" class="image-logomarca"/></a>
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
                            <a href="#" target="_blank"><img src="assets/index/images/svg/icone-facebook.svg"></a>
                            <a href="#" target="_blank"><img src="assets/index/images/svg/icone-instagram.svg"></a>
                            <a href="#" target="_blank"><img src="assets/index/images/svg/icone-linkedin.svg"></a>
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
    {{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">--}}
        {{--Launch demo modal--}}
    {{--</button>--}}

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><h2 style="display:none;" class="pt3">Valor selecionado</h2<p style="display:none;" id="pt3" class="pt3">R$5.000,00</p>></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <form style="display:none;" id="pt3" class="pt3" >
                        <span class="plots">Em quantas parcelas?</span>
                        <input type="radio" name="simulation-plots2" value="24" class="simulation-item" data-line="24" disabled>
                        <input type="radio" name="simulation-plots2" value="20" class="simulation-item" data-line="20" disabled>
                        <input type="radio" name="simulation-plots2" value="18" class="simulation-item" data-line="18" disabled>
                        <input type="radio" name="simulation-plots2" value="12" class="simulation-item" data-line="12" disabled>
                        <input type="radio" name="simulation-plots2" value="06" class="simulation-item" data-line="06" disabled>
                        <input type="radio" name="simulation-plots2" value="03" class="simulation-item" data-line="03" disabled>

                        <span class="plots-value">*</span>

                        <input type="text" name="simulation-name" placeholder="Nome completo" class="simulation-info"/>
                        <input type="text" name="simulation-cpf" id="simulation-cpf" placeholder="CPF" class="simulation-info"/>
                        <input type="email" name="simulation-email" placeholder="E-mail" class="simulation-info"/>
                        <select id="reason" class="simulation-info">
                            <option disabled selected>Qual a finalidade?</option>
                            <option value="renegociar-dividas">Renegóciar dívidas</option>
                            <option value="investir-negocio">Investir no meu negócio</option>
                            <option value="reformar">Reformar</option>
                            <option value="comprar-veiculo">Comprar um veículo</option>
                            <option value="quitar-debitos-veiculo">Quitar débitos do veículo</option>
                            <option value="casamento">Casamento</option>
                            <option value="ferias">Férias</option>
                            <option value="mudanca-imovel">Mudança de imóvel</option>
                            <option value="outros-motivos">Outros motivos</option>
                        </select>

                        {{--<div class="simulation-button"><input type="button" value="Continuar" class="simular_agora simulation-box__submit" /></div>--}}
                    </form>
                </div>
                <div class="modal-footer">
                    {{--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                    <button type="button" class="btn btn-primary">Simular</button>
                </div>
            </div>
        </div>


</div>

<!--  script slider recomendações -->

<script src="{{asset('node_modules/jquery-mask-plugin/dist/jquery.mask.js')}}"></script>
<script src="{{asset('assets/index/js/simulacao.js')}}"></script>

<script src="{{asset('node_modules/inputmask/dist/inputmask/inputmask.js')}}"></script>
<script src="{{asset('node_modules/inputmask/dist/inputmask/inputmask.extensions.js')}}"></script>
<script src="{{asset('node_modules/inputmask/dist/inputmask/inputmask.numeric.extensions.js')}}"></script>
<script src="{{asset('node_modules/inputmask/dist/inputmask/inputmask.date.extensions.js')}}"></script>
<script src="{{asset('node_modules/inputmask/dist/inputmask/jquery.inputmask.js')}}"></script>
{{--<script src="{{asset('dist/inputmask/jquery.inputmask.js')}}"></script>--}}
{{--<script src="{{asset('dist/inputmask/jquery.inputmask.js')}}"></script>--}}
{{--<script src="{{asset('dist/inputmask/jquery.inputmask.js')}}"></script>--}}
{{--<script src="{{asset('dist/inputmask/jquery.inputmask.js')}}"></script>--}}
<script>
    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav'
    });
    $('.slider-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        dots: false,
        centerMode: true,
        focusOnSelect: true,
        responsive: [
            {
                breakpoint: 980, // tablet breakpoint
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 480, // mobile breakpoint
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });




</script>

</body>
</html>
