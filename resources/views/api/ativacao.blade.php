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


        .modal-open .modal.modal-center {
            display: flex!important;
            align-items: center!important;

        }

        .modal-dialog {
            flex-grow: 1;
        }

        .text-modal{

            color: #958F8F;
            font-family: 'Verdana, Regular';
            font-size: 35px;
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
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    {{--<div class="modal-header">--}}
                    {{--<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>--}}
                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                    {{--<span aria-hidden="true">&times;</span>--}}
                    {{--</button>--}}
                    {{--</div>--}}
                    <div class="modal-body">
                        <form class="form-horizontal" method="POST" action="{{ route('ativacao') }}">
                            {{ csrf_field() }}



                            <div class="form-group{{ $errors->has('confirmation_code') ? ' has-error' : '' }}">
                                <label for="tel" class="col-md-12 control-label text-center text-modal">Insira o código</label>

                                <div class="col-md-12">
                                    <input data-inputmask="'mask': '9 9 9 9'" id="confirmation_code" type="text" class="form-control" name="confirmation_code" value="{{ old('confirmation_code') }}" required autofocus>
                                    {{--<input " type="text"  />--}}
                                    @if ($errors->has('confirmation_code'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('confirmation_code') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group text-center">
                                {{--<div class="col-md-12 mx-auto">--}}
                                <button type="submit" class="btn btn-success ">
                                    Enviar
                                </button>
                                {{--</div>--}}

                            </div>


                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-8 ">


                                    <a class="btn btn-link" href="{{ route('reset_code') }}">
                                        Não recebi o código
                                    </a>



                                </div>
                            </div>


                        </form>
                    </div>
                    {{--<div class="modal-footer">--}}
                    {{--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                    {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>


        <div class="facilita-bar col-md-12 col-lg-12 col-sm-12">
            <p class="mt-3">Atenção! A Facilita não solicita depósito antecipado para empréstimo. Em caso de dúvida entre em contato.</p>
        </div>


        <div class="col-md-12 col-xs-12 col-lg-12 teste">
            <div class="facilita-logo col-md-6 col-lg-6 col-sm-6">
                <img class="mt-1 ml-5" src="imagens/LogoFacilita.png" width="35%">
            </div>

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


<script src="node_modules/jQuery-Mask-Plugin-master/dist/jquery.mask.js"></script>
<script>

    $( document ).ready(function() {

        $('#exampleModal').modal('toggle');
    });


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

</script>
</body>
</html>

