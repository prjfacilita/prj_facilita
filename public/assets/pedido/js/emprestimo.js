/*JS EMPRESTIMO*/




        var step = 0;


        $('.solicitation-form__phone').mask('(00) 0000-0000');

        $(document).on('click','.step_01', function(){

            /**PRIMEIRO FORMULARIO*/

            console.log('Primeiro passo' + APP_URL);


            var nome_solicitante = $("#form-1 input[name=solicitation-name]").val();
            var dtn_solicitante = $("#form-1 input[name=solicitation-birth]").val();
            var nro_documento = $("#form-1 input[name=solicitation-doc]").val();
            var tp_documento = $('#tipo-documento').find(":selected").text();
            var solicitation_emission_id = $("#form-1 input[name=solicitation-emission-id]").val();
            var solicitation_organ = $("#form-1 input[name=solicitation-organ]").val();
            var sexo = $('#sexo').find(":selected").text();;
            var estado_civil = $('#estado-civil').find(":selected").text();
            var nacionalidade = $("#form-1 input[name=nacionalidade]").val();
            var naturalidade = $("#form-1 input[name=naturalidade]").val();
            var uf_nascimento = $('#uf-nascimento').find(":selected").text();
            var telefone = $("#form-1 input[name=telefone]").val();
            var celular = $("#form-1 input[name=celular]").val();
            var tel_recado = $("#form-1 input[name=telefone-recado]").val();
            var nome_mae = $("#form-1 input[name=nome-mae]").val();
            var nome_conjuge = $("#form-1 input[name=nome-conjuge]").val();
            var cpf_conjuge = $("#form-1 input[name=cpf-conjuge]").val();
            var nasto_conjuge = $("#form-1 input[name=nascto-conjuge]").val();
            var sexo_conjuge = $('#sexo-conjuge').find(":selected").text();
            var pb_exposta = $('#publicamente-exposta').find(":selected").text();



            axios.post(APP_URL + '/pedido_emprestimo_parte01', {
                nome_solicitante: nome_solicitante,
                dtn_solicitante: dtn_solicitante,
                nro_documento: nro_documento,
                tp_documento: tp_documento,
                solicitation_emission_id: solicitation_emission_id,
                solicitation_organ: solicitation_organ,
                sexo: sexo,
                estado_civil: estado_civil,
                nacionalidade: nacionalidade,
                naturalidade: naturalidade,
                uf_nascimento: uf_nascimento,
                telefone: telefone,
                celular: celular,
                tel_recado: tel_recado,
                nome_mae: nome_mae,
                nome_conjuge: nome_conjuge,
                cpf_conjuge: cpf_conjuge,
                nasto_conjuge: nasto_conjuge,
                sexo_conjuge: sexo_conjuge,
                pb_exposta: pb_exposta

            })
                .then(function (response) {
                    console.log(response);
                })
                .catch(function (error) {
                    console.log(error);
                });
            // uf-nacimento


            // estado_civil



            /*PEGAR DADOS E ENVIAR PARA O BACK-END LARAVEL*/


            // $.ajax({
            //     type: "POST",
            //
            //     url:  'http://ec2-18-212-126-252.compute-1.amazonaws.com/prj_facilita/public/api/simulador',
            //     data: {valorSolicitado: valorSolicitado, qteParcelas: qteParcelas, cpf:cpf, email:email, name:name},
            //     success: function( data, msg ) {
            //
            //         console.log(msg);
            //
            //         $(".plots-value").html('Sua parcela mensal será a partir de  R$ '+ data["teste"]+' ');
            //         $("input[name=simulacao_id]").val(data['lastInserId']);
            //     }
            //     // });
            // });

        });



        // $(document).on('click','.step_01', function(){
        //
        //     if(step != 2){
        //
        //         return false;
        //     }
        //     /**PRIMEIRO FORMULARIO*/
        //
        // });
        //
        //
        // $(document).on('click','.step_01', function(){
        //
        //     /**PRIMEIRO FORMULARIO*/
        //
        // });
        //
        // $(document).on('click','.step_01', function(){
        //
        //     /**PRIMEIRO FORMULARIO*/
        //
        // });
