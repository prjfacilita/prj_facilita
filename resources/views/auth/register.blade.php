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
    <link rel="stylesheet" type="text/css"  href="assets/cadastro/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"  href="assets/cadastro/css/register.css">
    <link rel="stylesheet" type="text/css"  href="assets/cadastro/css/font-awesome.min.css">
</head>

<body id="register">

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
                <div class="col-md-8 col-lg-8 col-sm-8 login mx-auto">

                    <div class="login-area">
                        {{--<h2>Acesse sua conta</h2>--}}
                        {{--<h3>Empréstimo pessoal</h3>--}}

                        <div class="login-form mt-5">
                            <form class=""   method="POST" action="{{ route('register') }}">

                                {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}

                                    {{--{{ csrf_field() }}--}}
                                    {{--<label for="email" class=" col-md-4 control-label">Email</label>--}}


                                    {{--<input id="email" type="email" placeholder="E-mail" class="login-form__email"  name="email" value="{{ old('email') }}" required autofocus>--}}

                                    {{--@if ($errors->has('email'))--}}
                                        {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}

                                {{--</div>--}}


                                {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
                                    {{--<label for="password" class="col-md-4 control-label">Senha</label>--}}

                                    {{--<div class="col-md-6">--}}
                                    {{--<input id="password" type="password" placeholder="Senha" class="login-form__password"  name="password" required>--}}

                                    {{--@if ($errors->has('password'))--}}
                                        {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                {{ csrf_field() }}


                                <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                                    {{--<label for="nome" class="col-md-4 control-label">Nome:</label>--}}

                                    {{--<div class="col-md-6">--}}
                                        <input id="nome" type="text" placeholder="Nome:" class="login-form__email" name="nome" value="{{ $nome or "" }}" required autofocus autocomplete="off">

                                        @if ($errors->has('nome'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </span>
                                        @endif
                                    {{--</div>--}}
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    {{--<label for="email" class="col-md-4 control-label">E-Mail</label>--}}

                                    {{--<div class="col-md-6">--}}
                                        <input id="email" type="email"  placeholder="Email:" class="login-form__email" name="email" value="{{ $email or "" }}" required autocomplete="off>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    {{--</div>--}}
                                </div>

                                <div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }}">
                                    {{--<label for="cpf" class="col-md-4 control-label">Cpf</label>--}}

                                    {{--<div class="col-md-6">--}}
                                        <input id="cpf" type="text" placeholder="CPF:" class="login-form__email" name="cpf" value="{{ $cpf or "" }}" required autofocus autocomplete="off>

                                        @if ($errors->has('cpf'))
                                            <span class="help-block'>
                                        <strong>{{ $errors->first('cpf') }}</strong>
                                            </span>
                                        @endif
                                    {{--</div>--}}
                                </div>


                                <div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }}">
                                    {{--<label for="tel" class="col-md-4 control-label">Telefone</label>--}}

                                    {{--<div class="col-md-6">--}}
                                        <input id="tel" type="text" placeholder="Tel:" class="login-form__email" name="tel" value="" required autofocus autocomplete="off>

                                        @if ($errors->has('tel'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('tel') }}</strong>
                                    </span>
                                        @endif
                                    {{--</div>--}}
                                </div>

                                {{--<input type="email" name="email" placeholder="E-mail" class="login-form__email" />--}}
                                {{--<input type="password" name="password" placeholder="Senha" class="login-form__password" />--}}
                                {{--<a href="" class="password-reveal"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>--}}

                                <div class="login-form-action">

{{--                                    <a href="{{ route('password.request') }}" class="login-form__recover-password">Esqueci minha senha</a>--}}
                                    <input type="submit" value="Enviar" class="mx-auto login-form__submit" />
                                </div>
                            </form>
                        </div>

                        {{--<a href="{{ route('register') }}" class="login-area__register">Não tem cadastro?</a>--}}
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- fim login -->

</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script src="node_modules/jQuery-Mask-Plugin-master/dist/jquery.mask.js"></script>

<script>
    $('#cpf').mask('000.000.000-00', {reverse: true});
    $('#tel').mask('(00) 0000-00000');
</script>
</body>
</html>



