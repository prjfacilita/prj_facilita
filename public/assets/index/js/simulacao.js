/*SCRIPT RESPONSÁVEL PELA SIMULAÇÃO DO EMPRESTIMO*/




        /*Click para simulação*/

        // let clicks = 0;
        var value = 0;
        var qtdParcelas = 0;

        ///validar cpf
        $('#simulation-cpf').mask('000.000.000-00', {reverse: true});

        $(document).on('click','.simulation-value', function(e){

            e.preventDefault();
            e.preventDefault();


            /*Verificar se houve o click*/

            if ( ! $("input[name=\"simulation-value\"]:checked").is(':checked') ){

                return false;
            }


                if (document.querySelector('input[name="simulation-value"]:checked').value) {

                    value = document.querySelector('input[name="simulation-value"]:checked').value;
                    console.log(value);
                }else{

                    return false;
                }


                valueCorreto = document.querySelector('input[name="simulation-value"]:checked').value;

                $("body").data('simulacao', valueCorreto);

                $(".simulation-box form.pt1").css('display', 'none'); // ocultar formulario 1
                $(".simulation-box h2.pt1").css('display', 'none'); // ocultar h2
                $(".simulation-box form.pt2").css('display', 'block'); // ocultar formulario
                $(".simulation-box p.pt2").css('display', 'block'); // ocultar h2
                $(".simulation-box h2.pt2").css('display', 'block'); // ocultar h2
                $(".simulation-box p.pt2").html('R$ ' + formatReal(value));

                $('.banner__simulation').addClass('simulation-value-selected');
                $('.banner__simulation').removeClass('simulation-value');




        });



        // console.log(value);
        $(document).on('click','.simulation-item', function(e) {

            e.preventDefault();

            if ( ! $("input[name=\"simulation-plots\"]:checked").is(':checked') ){

                return false;
            }




            $(".simulation-box form.pt2").css('display','none'); // ocultar formulario
            $(".simulation-box h2.pt2").css('display','none'); // ocultar h2
            $(".simulation-box p.pt2").css('display','none');

            /*Call modal*/


            // chamada da api

            CalcularParcelas();
            $('#exampleModal').modal('toggle');

            $("form.pt3").css('display','block'); // ocultar formulario
            $("p.pt3").css('display','block'); // ocultar h2
            $("h2.pt3").css('display','block'); // ocultar h2


            // var value = $("body").data('simulacao')
            $("p.pt3").html('R$' + formatReal( $("body").data('simulacao') ));


            qtdParcelas = document.querySelector('#pt2 input[name="simulation-plots"]:checked').value;

            $("input[name='simulation-plots2'][value='"+qtdParcelas+"']").prop('checked', true);

        });


        /*FUNÇÃO PAARA FORMATAR O VALOR*/
        function formatReal( int ) {
            var tmp = int+'';
            tmp = tmp.replace(/([0-9]{2})$/g, ",$1");
            if( tmp.length > 6 )
                tmp = tmp.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
            return tmp;
        }





        /*RETORNAR MASCARA DE MOEDA PARA INPUT OUTRO VALOR INDEX SIMULAÇÃO EMPRESTIMO*/
            // $(document).ready(function(){
            //     $('[id^=simulation-other-value]').keypress(validateNumber);
            //
            //
            // });
            //
            //
            // function validateNumber(event) {
            //     var key = window.event ? event.keyCode : event.which;
            //     if (event.keyCode === 8 || event.keyCode === 46) {
            //         return true;
            //     } else if ( key < 48 || key > 57 ) {
            //         return false;
            //     } else {
            //         return true;
            //     }
            // };



            $(document).ready(function(){
                $("#simulation-other-value").inputmask('decimal', {
                    'alias': 'numeric',
                    'groupSeparator': ',',
                    'autoGroup': true,
                    'digits': 2,
                    'radixPoint': ".",
                    'digitsOptional': false,
                    'allowMinus': false,
                    'prefix': 'R$ ',
                    'placeholder': ''
                })});





// $(document).on('click', '.simular_agora', function (e) {


                function CalcularParcelas(){




                // <input type="text" name="simulation-name" placeholder="Nome completo" class="simulation-info"/>
                //         <input type="text" name="simulation-cpf" id="simulation-cpf" placeholder="CPF" class="simulation-info"/>
                //         <input type="email" name="simulation-email" placeholder="E-mail" class="simulation-info"/>
                //         <select id="reason" class="simulation-info">

                // var input_1 =




                var valorSolicitado = $("body").data('simulacao');
                var qteParcelas = $("input[name=simulation-plots]").val();
                var cpf = $("input[name=simulation-cpf]").val();
                var email = $("input[name=simulation-email]").val();
                var name = $("input[name=simulation-name]").val();

                // TestaCPF(cpf);

                    $.ajax({
                        type: "POST",

                        url:  'http://ec2-18-212-126-252.compute-1.amazonaws.com/prj_facilita/public/api/simulador',
                        data: {valorSolicitado: valorSolicitado, qteParcelas: qteParcelas, cpf:cpf, email:email, name:name},
                    success: function( data, msg ) {

                        console.log(msg);
                        // <span class="plots-value">*</span>

                        $(".plots-value").html('Sua parcela mensal será a partir de  R$ '+ data["teste"]+' ');

                        // alert(data['lastInserId']);
                        $("input[name=simulacao_id]").val(data['lastInserId']);
                        // alert(msg);
                        // $("#ajaxResponse").append("<div>"+msg+"</div>");
                    }
                    // });
                    });

                }






        function TestaCPF(strCPF) {
            var Soma;
            var Resto;
            Soma = 0;
            if (strCPF == "00000000000") return false;

            for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
            Resto = (Soma * 10) % 11;

            if ((Resto == 10) || (Resto == 11))  Resto = 0;
            if (Resto != parseInt(strCPF.substring(9, 10)) ) return false;

            Soma = 0;
            for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
            Resto = (Soma * 10) % 11;

            if ((Resto == 10) || (Resto == 11))  Resto = 0;
            if (Resto != parseInt(strCPF.substring(10, 11) ) ) return false;
            return true;
        }




        $('#exampleModal').on('hidden.bs.modal', function () {
            // do something…
            // alert('hye');

            location.reload();
        });


