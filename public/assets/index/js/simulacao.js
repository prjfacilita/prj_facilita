/*SCRIPT RESPONSÁVEL PELA SIMULAÇÃO DO EMPRESTIMO*/




/*Click para simulação*/

        let clicks = 0;
        let value = 0;
        let qtdParcelas = 0;

        $(document).on('click','.simulation-value', function(e){

            e.preventDefault();


            /*Verificar se houve o click*/

            if ( ! $("input[name=\"simulation-value\"]:checked").is(':checked') ){

                return false;
            }

            clicks += 1;


            if(clicks == 1) {


                if (document.querySelector('input[name="simulation-value"]:checked').value) {

                    value = $('input[name="simulation-value"]:checked').attr("data-value");
                    console.log(value);
                }

                $(".simulation-box form.pt1").css('display', 'none'); // ocultar formulario 1
                $(".simulation-box h2.pt1").css('display', 'none'); // ocultar h2
                $(".simulation-box form.pt2").css('display', 'block'); // ocultar formulario
                $(".simulation-box p.pt2").css('display', 'block'); // ocultar h2
                $(".simulation-box h2.pt2").css('display', 'block'); // ocultar h2
                $(".simulation-box p.pt2").html('R$ ' + formatReal(value));
                $('.banner__simulation').addClass('simulation-value-selected');
                $('.banner__simulation').removeClass('simulation-value');

            }

            if(clicks == 2){

                if ( ! $("input[name=\"simulation-plots\"]:checked").is(':checked') ){

                    return false;
                }

                $(".simulation-box form.pt2").css('display','none'); // ocultar formulario
                $(".simulation-box h2.pt2").css('display','none'); // ocultar h2
                $(".simulation-box p.pt2").css('display','none');


                $(".simulation-box form.pt3").css('display','block'); // ocultar formulario
                $(".simulation-box p.pt3").css('display','block'); // ocultar h2
                $(".simulation-box h2.pt3").css('display','block'); // ocultar h2

                $(".simulation-box p.pt3").html('R$' + formatReal( value ));


                qtdParcelas = document.querySelector('#pt2 input[name="simulation-plots"]:checked').value;

                $("input[name='simulation-plots2'][value='"+qtdParcelas+"']").prop('checked', true);

            }



        });


        /*FUNÇÃO PAARA FORMATAR O VALOR*/
        function formatReal( int ) {
            var tmp = int+'';
            tmp = tmp.replace(/([0-9]{2})$/g, ",$1");
            if( tmp.length > 6 )
                tmp = tmp.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
            return tmp;
        }






