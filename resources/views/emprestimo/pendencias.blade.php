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

    {{--<link rel="stylesheet" href="{{asset('node_modules/')}}/fonts.css">--}}
    <link rel="stylesheet" type="text/css"  href="assets/pendencias/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"  href="assets/pendencias/css/style.css">
    <link rel="stylesheet" type="text/css"  href="assets/pendencias/css/style-pedido-emprestimo.css">
    <link rel="stylesheet" type="text/css"  href="assets/pendencias/css/font-awesome.min.css">

    <!-- SCRIPT -->
    <script src="assets/pendencias/js/jquery-3.3.1.min.js"></script>
    <script src="assets/pendencias/js/bootstrap.min.js"></script>

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
                <a class="logomarca" href="#"><img src="assets/pendencias/images/logo-facilita.png" alt="Logomarca Facilita" class="image-logomarca"/></a>
                <div class="user-logged">
                    <img src="assets/pendencias/images/icon-user.png" alt="Ícone Usuário" class="icon-user-logged mr-5"/>
                    <p class="mr-5" style="color: #fff;">Olá {{Auth::user()->email}}, pedido em andamento!</p>
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

                <div class="col-sm-3 solicitation-header__area solicitation-header__checked">
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
                    {{--<a href="#" class="solicitation-inf__alter">Alterar</a>--}}
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" class="solicitation-inf__alter">Alterar</a>

                </div>

            </div>
        </div>
    </section>
    <!-- solicitation inf-->

    <!-- pedido enviado -->
    <section class="solicitation-register">
        <div class="container">
            <div class="row">

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
                                <form id="form_alterar_pedido" name="form_alterar_pedido" method="POST" action="{{route('alterar_pedido')}}" enctype="multipart/form-data">

                                    <div class="solicitation-register__form">
                                        <div class="col-sm-10">
                                            <label>Valor: <input type="text" id="alterar_valor" name="alterar_valor" class="solicitation-form__name solicitation-input valor_alterar"  required></label>
                                        </div>

                                        <div class="col-sm-10">
                                            {{--<div class="col-sm-2">--}}
                                            <label>Parcelas
                                                <select required name="alterar_parcelas" id="alterar_parcelas">
                                                    {{--<option disabled="" selected="">Selecionar</option>--}}
                                                    <option value="3">3</option>
                                                    <option value="6">6</option>
                                                    <option value="12">12</option>
                                                    <option value="18">18</option>
                                                    <option value="20">20</option>
                                                    <option value="24">24</option>
                                                </select></label>
                                            {{--</div>--}}
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


                <div class="col-12 solicitation-register__area">

                    <div class="order-dispatched">
                        <div>
                            <h2>Seu pedido </br>foi enviado</h2>
                        </div>
                        <div>
                            <p>envie as informações abaixo para validarmos os seus dados. é simples e rápido.</p>
                        </div>
                        <div>
                            <p>Seu contrato é válido por</p>
                            <span>10 dias</span>
                        </div>
                    </div>

                    <div class="solicitation-accordion">
                        <div id="accordion">

                            <!-- resumo pedido  -->
                            <div class="acordion-order-dispatched order-summary card">
                                <div>
                                    <a class="card-link" data-toggle="collapse" href="#form-1">
                                        Resumo do pedido
                                    </a>
                                </div>

                                <div id="form-1" class="accordion-form collapse" data-parent="#accordion">
                                    <div class="card-body">

                                        <!-- inicio resumo pedido  -->
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
                                                    <span>{{date('d', strtotime("+".($quantidadeParcelas - 1)." months", strtotime($dataPrimeiraParcela)))}}  {{ date('F', strtotime(str_replace('-','/', date('n', strtotime("+".($quantidadeParcelas - 1)." months", strtotime($dataPrimeiraParcela))))))}}</span>
                                                    <span>{{ date('Y', strtotime(str_replace('-','/', date('Y-m-d', strtotime("+".($quantidadeParcelas - 1)." months", strtotime($dataPrimeiraParcela))))))}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- fim resumo pedido -->

                            <!-- formulário documentos pendentes  -->
                            <div class="acordion-order-dispatched acordion-documents">
                                <div>
                                    <a class="card-link collapsed" data-toggle="collapse" href="#form-2">
                                        Documentos pendentes
                                    </a>
                                </div>

                                <div id="form-2" class="accordion-form collapse" data-parent="#accordion">

                                    <div class="card-body">
                                        <div class="card-documents">
                                            <h2>Foto pessoal e documento de identificação</h2>
                                            <p>Envie seus documentos para continuar</p>
                                            <a href="">Enviar documentos</a>
                                        </div>

                                        <div class="card-documents">
                                            <h2>Conta bancária</h2>
                                            <p>@if($conta  == true && $agencia == true && $bancoValido == true )
                                                <td>Dados validados com sucesso</td>
                                            @else
                                                <td>@if($conta == false) Conta invalida @endif;</td>
                                                <td> @if($agencia == false) Agencia invalida @endif;</td>
                                                <td> @if($bancoValido == false) Banco invalido @endif;</td>
                                                @endif
                                            {{--Estamos analisando esta informação</p>--}}
                                        </div>

                                        <div class="card-documents">
                                            <h2>Comprovante de residência</h2>
                                            <p>Envie seu comprovante de residência para continuar</p>
                                            <a href="{{route('enviar_documento')}}">Enviar documento</a>
                                        </div>

                                        <div class="card-documents">
                                            <h2>Comprovante de renda <span>(Opcional)</span></h2>
                                            <p>Envie seu comprovante de renda para continuar</p>
                                            <a href="">Enviar documento</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- fim documentos pendentes  -->

                            <!-- formulário assinatura de contrato  -->
                            <div class="acordion-order-dispatched">
                                <div>
                                    <a class="card-link collapsed" data-toggle="collapse" href="#form-3">
                                        Assinatura de contratos
                                    </a>
                                </div>

                                <div id="form-3" class="accordion-form collapse" data-parent="#accordion">

                                    <div class="card-body acordion-signature">
                                        <p>mesmo após a assinatura dos contratos, seu emprétimo será efetivado somente se a sua documentação e o seu cadastro forem aprovados.</p>

                                        <div>ESPAÇO PARA PDF</div>
                                        <div class="solicitation-register-btn">
                                            <a href="" class="solicitation-next"><i class="fa fa-check" aria-hidden="true"></i>Assinar 2 documentos</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- fim formulário assinatura de contrato  -->

                        </div>
                    </div> <!--acordions-->

                    <div class="solicitation-register-btn">
                        <a href="" class="solicitation-back">Voltar</a>
                        <a href="" class="solicitation-next">Continuar</a>
                    </div>

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
<script src="{{asset('js/plentz-jquery-maskmoney-cdbeeac/dist/jquery.maskMoney.js')}}"></script>

<script src="{{asset('js/alterar_pedido.js')}}"></script>

<script>
    $(".valor_alterar").maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});

</script>
</body>
</html>
