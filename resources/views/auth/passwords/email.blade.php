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


        .teste{
            width: 100%;
            height: 35%;
            background-color: #1D8841;
            -moz-box-shadow: #000000;
            /*opacity 50%;*/
        }



        .login-form__submit{
            width: 163.81px;
            height: 42.58px;
            font-size: 22px;
            text-transform: uppercase;
            cursor: pointer;
            border-radius: 32px;
            box-shadow: 7px 7px 6px rgba(0, 0, 0, 0.16);
            -webkit-box-shadow: 7px 7px 6px rgba(0, 0, 0, 0.16);
            -moz-box-shadow: 7px 7px 6px rgba(0, 0, 0, 0.16);
            background: #1D8841;
            color: #fff;
        }


        .reset-form input:not([type=submit]):focus{
            border-color: #1EC857;
        }

        .register__input__password {
            padding: 10px;
            margin: 20px 20px 0 0;
            width: 325px;
            height: 66px;
            font-style: italic;
            border-radius: 12px;
            border: 1px solid #707070;
        }

        .span_class_001{
            font-family: 'Verdana, Bold';
            font-size: 38px;
            color:#1D8841;
        }

        .span_class_002{
            color: #1D8841;
            font-size: 23px;
            font-family: 'Verdana, Regular';
        }


        .reset-form input:not([type=submit]){
            padding: 15px 10px;
            margin-bottom: 15px;
            width: 100%;
            font-size: 18px;
            color: #958F8F;
            border-bottom: 1px solid #707070;
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



        <div class="facilita-bar col-md-12 col-lg-12 col-sm-12">
            <p class="mt-3">Atenção! A Facilita não solicita depósito antecipado para empréstimo. Em caso de dúvida entre em contato.</p>
        </div>


        <div class="col-md-12 col-xs-12 col-lg-12 teste">
            <div class="facilita-logo col-md-6 col-lg-6 col-sm-6">
                <img class="mt-1 ml-5" src="{{asset('imagens/LogoFacilita.png')}}" width="35%">
            </div>

        </div>



        {{--<div class="col-md-8">--}}
            {{--@extends('layouts.app')--}}

{{--            @section('content')--}}
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 mx-auto">
                            <div class="panel panel-default">
                                <div class="panel-heading span_class_001 text-center">Redefinir Senha</div>

                                <div class="panel-body">
                                    @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                    @endif


                                    <form class=" reset-form" name="reset-form" method="POST" action="{{ route('password.email') }}">
                                        {{ csrf_field() }}


                                        <div class="col-md-6 col-lg-6 col-sm-6">
                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            {{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}

                                            {{--<div class="col-md-6">--}}

                                            <span class="span_class_002">Enviaremos um link para redefinir senha</span>
                                            <input placeholder="Email:" id="email" type="email" class="register__input__password" name="email" value="{{ old('email') }}" required>

                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            {{--</div>--}}
                                        </div>

                                        </div> <!-- end col md 6 col lg col sm -->

                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <input value="Enviar" name="enviar" type="submit" class="login-form__submit">

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {{--@endsection--}}



        {{--</div>--}}





    </div>




</div>

{{--</div>--}}

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>



<link href="{{asset('css/facilita.css')}}" rel="stylesheet">
<link href="{{asset('node_modules/@fortawesome/fontawesome-free/css/fontawesome.min.css')}}" rel="stylesheet">


<script src="{{asset('node_modules/jQuery-Mask-Plugin-master/dist/jquery.mask.js')}}"></script>
<script>

    //    $( document ).ready(function() {
    //
    //        $('#exampleModal').modal('toggle');
    //    });


    // var options =  {
    //     onComplete: function(cep) {
    //         alert('CEP Completed!:' + cep);
    //     },
    //     onKeyPress: function(cep, event, currentField, options){
    //         console.log('A key was pressed!:', cep, ' event: ', event,
    //             'currentField: ', currentField, ' options: ', options);
    //     },
    //     onChange: function(cep){
    //         console.log('cep changed! ', cep);
    //     },
    //     onInvalid: function(val, e, f, invalid, options){
    //         var error = invalid[0];
    //         console.log ("Digit: ", error.v, " is invalid for the position: ", error.p, ". We expect something like: ", error.e);
    //     }
    // };
    //
    // $('#confirmation_code').mask('00000-000', options);

    // $('#confirmation_code').mask("0000000", {placeholder: "__/__/____"});

    // window.setTimeout( function(){
    //     window.location = "/login";
    // }, 300 );
</script>
</body>
</html>

