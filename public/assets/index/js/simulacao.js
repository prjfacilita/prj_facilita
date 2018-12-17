/*SCRIPT RESPONSÁVEL PELA SIMULAÇÃO DO EMPRESTIMO*/




/*Click para simulação*/

        // let clicks = 0;
        let value = 0;
        let qtdParcelas = 0;

        $(document).on('click','.simulation-value', function(e){

            e.preventDefault();


            /*Verificar se houve o click*/

            if ( ! $("input[name=\"simulation-value\"]:checked").is(':checked') ){

                return false;
            }


                if (document.querySelector('input[name="simulation-value"]:checked').value) {

                    value = $('input[name="simulation-value"]:checked').attr("data-value");
                    console.log(value);
                }else{

                    return false;
                }

                $(".simulation-box form.pt1").css('display', 'none'); // ocultar formulario 1
                $(".simulation-box h2.pt1").css('display', 'none'); // ocultar h2
                $(".simulation-box form.pt2").css('display', 'block'); // ocultar formulario
                $(".simulation-box p.pt2").css('display', 'block'); // ocultar h2
                $(".simulation-box h2.pt2").css('display', 'block'); // ocultar h2
                $(".simulation-box p.pt2").html('R$ ' + formatReal(value));

                alert(value);
                $('.banner__simulation').addClass('simulation-value-selected');
                $('.banner__simulation').removeClass('simulation-value');



        });



        $(document).on('click','.simulation-item', function(e) {

            e.preventDefault();

            if ( ! $("input[name=\"simulation-plots\"]:checked").is(':checked') ){

                return false;
            }

            if ( ! $("input[name=\"simulation-value\"]:checked").is(':checked') ){

                return false;
            }





            $(".simulation-box form.pt2").css('display','none'); // ocultar formulario
            $(".simulation-box h2.pt2").css('display','none'); // ocultar h2
            $(".simulation-box p.pt2").css('display','none');

            /*Call modal*/

            alert(value);

            $('#exampleModal').modal('toggle');

            $("form.pt3").css('display','block'); // ocultar formulario
            $("p.pt3").css('display','block'); // ocultar h2
            $("h2.pt3").css('display','block'); // ocultar h2

            $("p.pt3").html('R$' + formatReal( value ));


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





$(document).on('click', '.simular_agora', function (e) {


    // <input type="text" name="simulation-name" placeholder="Nome completo" class="simulation-info"/>
    //         <input type="text" name="simulation-cpf" id="simulation-cpf" placeholder="CPF" class="simulation-info"/>
    //         <input type="email" name="simulation-email" placeholder="E-mail" class="simulation-info"/>
    //         <select id="reason" class="simulation-info">

    // var input_1 =




    var valorSolicitado = $("input[name=simulation-value]:checked").val();
    var qteParcelas = $("input[name=simulation-plots]").val();
    var cpf = $("input[name=simulation-cpf]").val();
    var email = $("input[name=simulation-email]").val();
    var name = $("input[name=simulation-name]").val();

        $.ajax({
            type: "POST",
            url:  'http://ec2-18-212-126-252.compute-1.amazonaws.com/prj_facilita/public/api/simulador',
            data: {valorSolicitado: valorSolicitado, qteParcelas: qteParcelas, cpf:cpf, email:email, name:name},
        success: function( data, msg ) {

            console.log(msg);
            // <span class="plots-value">*</span>

            $(".plots-value").html('Sua parcela mensal será entre R$ '+ data["teste"]+' e R$ '+ data["teste2"]+'');
            // alert(msg);
            // $("#ajaxResponse").append("<div>"+msg+"</div>");
        }
        // });
    });

    });




