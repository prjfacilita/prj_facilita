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


            $(".simulation-box form.pt1").css('display','none'); // ocultar formulario 1
            $(".simulation-box h2.pt1").css('display','none'); // ocultar h2
            $(".simulation-box form.pt2").css('display','block'); // ocultar formulario
            $(".simulation-box p.pt2").css('display','block'); // ocultar h2
            $(".simulation-box h2.pt2").css('display','block'); // ocultar h2
            $(".simulation-box p.pt2").html('R$ ' + formatReal( value ));
            $('.banner__simulation').addClass('simulation-value-selected');
            $('.banner__simulation').removeClass('simulation-value');



        });


        /*FUNÇÃO PAARA FORMATAR O VALOR*/
        function formatReal( int ) {
            var tmp = int+'';
            tmp = tmp.replace(/([0-9]{2})$/g, ",$1");
            if( tmp.length > 6 )
                tmp = tmp.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
            return tmp;
        }






