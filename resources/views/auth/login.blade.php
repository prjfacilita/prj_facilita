<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{--<!-- Styles -->--}}
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}

    <style>

        body {
            background: url('imagens/group197.png') no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            -o-background-size: cover;
        }

        .facilita-bar{
            width: 100%;
            background: #074A1E;

        }

        .facilita-bar p{

            font-family: 'Verdana, Regular';
            font-size: 10px;
            color:#FFFFFF;
            text-align: left;

        }

        .login-text01{

            font-family: 'Verdana, Bold';
            color:#FBFFFC;
            font-size: 50px;
            text-align: left;
        }

        .login-text02{
            font-family: 'Verdana, Bold';
            color:#FBFFFC;
            font-size:35px;
            text-align: left;
        }


        .input-login{
            

            background: transparent;
            width: 100%;
            border: none;
            outline: none;

            font-size: 16px;
            border-bottom: 1px solid;
            border-color: #ccc;




            height: 2em;
            line-height: 2em;





            /*border-bottom-width:;*/
        }


        .panel-login{

            border-radius: 8px;
            border: 1px solid #707070;
            background-color: #FFFFFF;
            padding-top: 1%;
            padding-bottom: 1%;


        }

    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>


{{--<div id="app">--}}




    <div class="bg"></div>


        <div class="container-fluid">
            <div class="row">


                <div class="facilita-bar col-md-12 col-lg-12 col-sm-12">
                    <p class="mt-3">Atenção! A Facilita não solicita depósito antecipado para empréstimo. Em caso de dúvida entre em contato.</p>
                </div>


                <div class="facilita-logo col-md-6 col-lg-6 col-sm-6">
                    <img class="mt-1 ml-5" src="imagens/LogoFacilita.png" width="35%">
                </div>




                   <div class="col-md-12 col-lg-12 col-sm-12 text-center">
                       <span class="login-text01 text-center">ACESSE SUA CONTA</span>
                   </div>

                    <div class="col-md-12 col-lg-12 col-sm-12 text-center">
                        <span class="login-text02 text-center">Empréstimo Pessoal</span>
                    </div>
                    {{--<p>Atenção! A Facilita não solicita depósito antecipado para empréstimo. Em caso de dúvida entre em contato.</p>--}}


                <div class="col-md-6 col-lg-5 col-sm-6 mx-auto panel-login">
                {{--<div class="card ">--}}
                    {{--<div class="card-header">--}}
                        {{--Featured--}}
                    {{--</div>--}}
                    {{--<div class="card-body">--}}
                        <form class="form-horizontal mb-3 mt-3" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class=" col-md-4 control-label">Email</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="input-login " name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Senha</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="input-login" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            {{--<div class="form-group">--}}
                                {{--<div class="col-md-6 col-md-offset-4">--}}
                                    {{--<div class="checkbox">--}}
                                        {{--<label>--}}
                                            {{--<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">


                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Esqueci minha senha
                                    </a>


                                    <button type="submit" class="btn btn-success">
                                        ENTRAR
                                    </button>
                                </div>
                            </div>
                        </form>
                    {{--</div>--}}
                {{--</div>--}}

                </div>

            </div>


            <div class="form-group">
                <div class="col-md-8 col-md-offset-8 mx-auto">


                    <a class="btn btn-link" href="{{ route('register') }}">
                        Não tem cadastro?
                    </a>



                </div>
            </div>

        </div>

{{--</div>--}}

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>



<link href="css/facilita.css" rel="stylesheet">
<link href="node_modules/@fortawesome/fontawesome-free/css/fontawesome.min.css" rel="stylesheet">

</body>
</html>

