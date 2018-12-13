<!doctype html>
<html lang="pt-BR">
<head>
    <title>Facillita</title>
    <!-- Required meta tags -->
    <meta name="description" content="Cadastre sua senha">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css"  href="{{asset('assets/cadastro/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{asset('assets/cadastro/css/style.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{asset('assets/cadastro/css/font-awesome.min.css')}}">
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
            <a class="logomarca" href="#"><img src="{{asset('/assets/cadastro/images/logo-facilita.png')}}" alt="Logomarca Facilita" class="image-logomarca"/></a>
            <div class="user-logged">
                <img src="{{asset('/assets/cadastro/images/icon-user.png')}}" alt="Ícone Usuário" class="icon-user-logged"/>
                <p>Olá Maria, seja bem vinda!</p>
            </div>
        </div>
    </div>
</header>

<div class="page-content">
    <!-- register -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 register">

                    <div class="register__area">
                        <h2 class="register__token">Token validado com sucesso!</h2>

                        <div class="register__form">
                            <h3>Cadastre sua senha:</h3>

                            <form method="POST" action="{{ url('/ativarconta') }}">

                                {{ csrf_field() }}

                                <input name="confirmation_code" type="hidden" value="{{$confirmation_code}}">
                                <input name="email" type="hidden" value="{{$email}}">

                                <div class="register__password">
                                    <label>Senha:</label>
                                    <input type="password" name="senha" id="senha" placeholder="Criar senha" class="register__input__password" />
                                    @if ($errors->has('senha'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('senha') }}</strong>
                                    </span>
                                    @endif

                                    <input  id="confirm-password" type="password" name="confirm_password" placeholder="Confirmar senha" class="register__input__password" />
                                    <p>A senha deverá ter no mínimo 8 caracteres com letras e números.</p>
                                </div>

                                <div class="register__terms">
                                    <p>A facilita crédito pessoal irá consultar seu histórico de crédito e seus dados pessoais. isso é importante para confirmarmos a sua identidade e avaliarmos corretamente o seu crédito.</p>
                                    <a href="#" target="_blank" class="terms__link-process">saiba mais sobre o processo de avaliação de crédito.</a>

                                    <input type="checkbox" name="accept-terms" value="accept" />
                                    <a href="#" target="_blank" class="terms__accept">Aceito os termos de cadastro</a>
                                </div>

                                <input type="submit" value="Criar conta" class="register__password__submit" />
                                <i class="fa fa-caret-right submit__icon" aria-hidden="true"></i>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- register -->

</div>
</body>
</html>
