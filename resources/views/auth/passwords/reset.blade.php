{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-8 col-md-offset-2">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">Reset Password</div>--}}

                {{--<div class="panel-body">--}}
                    {{--<form class="form-horizontal" method="POST" action="{{ route('password.request') }}">--}}
                        {{--{{ csrf_field() }}--}}

                        {{--<input type="hidden" name="token" value="{{ $token }}">--}}

                        {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">--}}
                            {{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>--}}

                                {{--@if ($errors->has('email'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
                            {{--<label for="password" class="col-md-4 control-label">Password</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password" type="password" class="form-control" name="password" required>--}}

                                {{--@if ($errors->has('password'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">--}}
                            {{--<label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>--}}
                            {{--<div class="col-md-6">--}}
                                {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>--}}

                                {{--@if ($errors->has('password_confirmation'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('password_confirmation') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<div class="col-md-6 col-md-offset-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--Reset Password--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--@endsection--}}



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
    <link rel="stylesheet" type="text/css"  href="{{asset('assets/cadastro/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{asset('assets/cadastro/css/register.css')}}">
    <link rel="stylesheet" type="text/css"  href="{{asset('assets/cadastro/css/font-awesome.min.css')}}">

    <style>
        .reset-form{
            float: left;
            margin: 30px 0;
            padding: 50px;
            /*padding-top: 5px;*/
            width: 100%;
            background: #fff;
            border-radius: 25px;
            /*box-shadow: 5px 5px  5px 5px #888888;*/
            border: 1px solid;
            /*padding: 10px;*/
            /*box-shadow: 10px 10px 10px 10px rgba(43, 43, 43, 0.15);*/
        }

        .reset-form form{
            position: relative;
        }
        /*| .password-reveal{*/
        /*position: absolute;*/
        /*right: 0;*/
        /*top: calc(100%/2.2);*/
        /*font-size: 15px;*/
        /*color: #958F8F;*/
        /*}*/
        .reset-form input:not([type=submit]){
            padding: 5px 10px;
            margin-bottom: 15px;
            width: 100%;
            font-size: 18px;
            color: #958F8F;
            border-bottom: 1px solid #707070;
        }
        .reset-form input:not([type=submit]):focus{
            border-color: #1EC857;
        }
    </style>

</head>

<body id="reset">

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
            <a class="logomarca" href="#"><img src="{{asset('imagens/LogoFacilita.png')}}" alt="Logomarca Facilita" class="image-logomarca"/></a>
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

                        <div class="reset-form">
                            <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                                {{ csrf_field() }}

                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">E-Mail</label>

                                    {{--<div class="col-md-6">--}}
                                        <input id="email" type="email" class="" name="email" value="{{ $email or old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    {{--</div>--}}
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Senha</label>

                                    {{--<div class="col-md-6">--}}
                                        <input id="password" type="password" class="" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    {{--</div>--}}
                                </div>

                                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <label for="password-confirm" class="col-md-4 control-label">Confirmar senha</label>
                                    {{--<div class="col-md-6">--}}
                                        <input id="password-confirm" type="password" class="" name="password_confirmation" required>

                                        @if ($errors->has('password_confirmation'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                        @endif
                                    {{--</div>--}}
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6">
                                        <button type="submit" class="mx-auto login-form__submit">
                                            Enviar
                                        </button>
                                    </div>
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

<script src="/node_modules/jQuery-Mask-Plugin-master/dist/jquery.mask.js"></script>

</body>
</html>
g


