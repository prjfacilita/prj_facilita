<!doctype html>
<html lang="pt-BR">
<head>
    <title>Facillita</title>
    <!-- Required meta tags -->
    <meta name="description" content="Faça seu login">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <!-- CSS -->

    <link rel="stylesheet" type="text/css"  href="{{ asset('fonts/fonts.css') }}">

    <link rel="stylesheet" type="text/css"  href="assets/cadastro/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"  href="assets/cadastro/css/style.css">
    <link rel="stylesheet" type="text/css"  href="assets/cadastro/css/font-awesome.min.css">
</head>

<body id="login">

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
            <a class="logomarca" href="#"><img src="assets/cadastro/images/logo-facilita.png" alt="Logomarca Facilita" class="image-logomarca"/></a>
        </div>
    </div>
</header>

<div class="page-content">
    <!-- login -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-6 col-sm-6 login mx-auto">

                    <div class="login-area">
                        <h2>Acesse sua conta</h2>
                        <h3>Empréstimo pessoal</h3>

                        <div class="login-form">
                            <form  method="post" action="{{ route('login') }}">

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                    {{ csrf_field() }}
                                    {{--<label for="email" class=" col-md-4 control-label">Email</label>--}}


                                    <input id="email" type="email" placeholder="E-mail" class="login-form__email"  name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif

                                </div>


                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    {{--<label for="password" class="col-md-4 control-label">Senha</label>--}}

                                    {{--<div class="col-md-6">--}}
                                        <input id="password" type="password" placeholder="Senha" class="login-form__password"  name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    {{--</div>--}}
                                </div>

                                {{--<input type="email" name="email" placeholder="E-mail" class="login-form__email" />--}}
                                {{--<input type="password" name="password" placeholder="Senha" class="login-form__password" />--}}
                                <a href="" class="password-reveal"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>

                                <div class="login-form-action">

                                    <a href="{{ route('password.request') }}" class="login-form__recover-password">Esqueci minha senha</a>
                                    <input type="submit" value="Entrar" class="login-form__submit" />
                                </div>
                            </form>
                        </div>

                        <a href="{{ route('register') }}" class="login-area__register">Não tem cadastro?</a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- fim login -->

</div>
</body>
</html>
