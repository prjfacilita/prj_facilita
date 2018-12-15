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



        });





