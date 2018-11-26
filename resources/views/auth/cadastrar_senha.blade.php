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


{{--<div class="h-75 d-inline-block bg" style="width: 120px; background-color: rgba(0,0,255,.1)">Height 75%</div>--}}


<div class="container-fluid">
    <div class="row">
        <!-- Button trigger modal -->
    {{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">--}}
    {{--Launch demo modal--}}
    {{--</button>--}}

    <!-- Modal -->

        <div class="col-lg-12 col-md-12 col-ms-12 h-75 d-inline-block" style="width: 100%x; background-color: #ccc;"></div>


        <div class="facilita-bar col-md-12 col-lg-12 col-sm-12">
            <p class="mt-3">Atenção! A Facilita não solicita depósito antecipado para empréstimo. Em caso de dúvida entre em contato.</p>
        </div>


        <div class="facilita-logo col-md-6 col-lg-6 col-sm-6">
            <img class="mt-1 ml-5" src="imagens/LogoFacilita.png" width="35%">
        </div>




        <form class="form-horizontal mt-4 mb-4 ml-4 mr-4" method="POST" action="{{ route('confirmacao') }}">
            {{ csrf_field() }}



            <div class="form-group{{ $errors->has('senha') ? ' has-error' : '' }}">
                <label for="senha" class="col-md-4 control-label">Cadastrando senha</label>


                <input name="confirmation_code" type="hidden" value="{{$confirmation_code}}">
                <input name="email" type="hidden" value="{{$email}}">
                <div class="col-md-6">
                    <input id="senha" type="text" class="form-control" name="senha" value="{{ old('senha') }}" required autofocus>

                    @if ($errors->has('senha'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('senha') }}</strong>
                                    </span>
                    @endif
                </div>


                <label for="confirmar_senha" class="col-md-4 control-label">Cadastrando senha</label>

                <div class="col-md-6">
                    <input id="confirmar_senha" type="text" class="form-control" name="confirmar_senha" value="{{ old('confirmar_senha') }}" required autofocus>

                    @if ($errors->has('confirmar_senha'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('confirmar_senha') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>



            <div class="form-group">
                <div class="col-md-6 mx-auto">
                    <span>Termos de contrato</span>
                </div>

            </div>

            <div class="form-group">
                <div class="col-md-6 mx-auto">
                    <button type="submit" class="btn btn-primary">
                        Criar conta
                    </button>
                </div>

            </div>




        </form>



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

