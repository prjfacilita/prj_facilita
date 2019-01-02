/*JS EMPRESTIMO*/




        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('pedido_emprestimo_parte01');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

        var step = 0;




        $(document).on('click','.step_01', function(){

            /**PRIMEIRO FORMULARIO*/

            console.log('Primeiro passo' + APP_URL);

            if(step > 1) return alert('Você não pode editar as informações nessa etapa pois já preencheu os dados');


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

            if (nome_solicitante  === '') {
                alert('Text-field is empty.');
                return false;
            }


            alert('Loading');

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

                    step = 2;


                    $('#form-2').collapse('toggle');
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


        $(document).on('click','.step_02', function(){
            console.log('Primeiro passo' + APP_URL);


            if(step > 2) return alert('Você não pode editar as informações nessa etapa pois já preencheu os dados');


            var salario     =   $("#form-2 input[name=salario-name]").val();
            var ocupacao    =   $('#ocupacao-id').find(":selected").text();
            var escolaridade    =   $('#escolaridade-id').find(":selected").text();
            var profissao    =   $("#form-2 input[name=profissao-emission-id]").val();
            var cargo       =   $("#form-2 input[name=cargo-emission-id]").val();
            var empresa       =   $("#form-2 input[name=empresa]").val();
            var data_admissao       =   $("#form-2 input[name=data-admissao]").val();
            var end_comercial   = $("#form-2 input[name=endereco_comercial]").val();
            var end_com_nro    =  $("#form-2 input[name=endereco_comercial_nro]").val();
            var endereco_comercial_cep    =  $("#form-2 input[name=endereco_comercial_cep]").val();
            var endereco_comercial_bairro    =  $("#form-2 input[name=endereco_comercial_bairro]").val();
            var endereco_comercial_cidade    =  $("#form-2 input[name=endereco_comercial_cidade]").val();
            var endereco_comercial_uf    =   $('#endereco_comercial_uf').find(":selected").text();
            var complemento_endereco_comercial    =  $("#form-2 input[name=complemento_endereco_comercial]").val();
            var telefone_comercial    =  $("#form-2 input[name=telefone_comercial]").val();
            var ramal    =  $("#form-2 input[name=ramal]").val();




            axios.post(APP_URL + '/pedido_emprestimo_parte02', {
                salario: salario,
                ocupacao: ocupacao,
                escolaridade: escolaridade,
                profissao: profissao,
                cargo: cargo,
                empresa: empresa,
                data_admissao: data_admissao,
                end_comercial: end_comercial,
                end_com_nro: end_com_nro,
                endereco_comercial_cep: endereco_comercial_cep,
                endereco_comercial_bairro: endereco_comercial_bairro,
                endereco_comercial_cidade: endereco_comercial_cidade,
                endereco_comercial_uf: endereco_comercial_uf,
                complemento_endereco_comercial: complemento_endereco_comercial,
                telefone_comercial: telefone_comercial,
                ramal: ramal

            })
                .then(function (response) {
                    console.log(response);

                    step = 3;


                    $('#form-3').collapse('toggle');
                })
                .catch(function (error) {
                    console.log(error);
                });
            // data-admissa

        });







        ///////////////////////////////////////////////////////////////////////////////////////

        $(document).on('click','.step_03', function(){
            console.log('Primeiro passo' + APP_URL);


            if(step > 3) return alert('Você não pode editar as informações nessa etapa pois já preencheu os dados');


            var cep     =   $("#form-3 input[name=cep]").val();
            var endereco     =   $("#form-3 input[name=endereco]").val();
            var nro     =   $("#form-3 input[name=nro]").val();
            var complemento     =   $("#form-3 input[name=complemento]").val();
            var bairro     =   $("#form-3 input[name=bairro]").val();
            var cidade     =   $("#form-3 input[name=cidade]").val();
            var valor_patrimonio     =   $("#form-3 input[name=valor-patrimonio-name]").val();
            // var cep     =   $("#form-2 input[name=cep]").val();
            var residencia    =   $('#tipo-residencia-id').find(":selected").text();
            var uf_id    =   $('#uf').find(":selected").text();




            axios.post(APP_URL + '/pedido_emprestimo_parte03', {
                cep: cep,
                endereco: endereco,
                nro: nro,
                complemento: complemento,
                bairro: bairro,
                cidade: cidade,
                valor_patrimonio: valor_patrimonio,
                residencia: residencia,
                uf_id: uf_id


            })
                .then(function (response) {
                    console.log(response);

                    step = 4;


                    $('#form-3').collapse('toggle');
                })
                .catch(function (error) {
                    console.log(error);
                });
            // data-admissa

        });





        $(document).on('click','.step_04', function(){
            console.log('Primeiro passo' + APP_URL);


            if(step > 4) return alert('Você não pode editar as informações nessa etapa pois já preencheu os dados');


            var banco_id     =   $('#banco-id').find(":selected").text();
            var nro_agencia     =   $("#form-4 input[name=nro_agencia-name]").val();
            var nro_conta       =   $("#form-4 input[name=nro_conta]").val();
            var tipo_conta      =   $('#conta-tipo').find(":selected").text();
            var conta_desde     =   $("#form-4 input[name=conta-desde]").val();
            var nome_ref_pessoal    =   $("#form-4 input[name=nome-referencia-pessoal]").val();
            var cpf_ref_pessoal     =   $("#form-4 input[name=cpf-referencia-pessoal]").val();
            var grau_rel            =   $("#form-4 input[name=grau-relacionamento]").val();
            var tel_relacionamento  =   $("#form-4 input[name=telefone-relacionamentoo]").val();




            axios.post(APP_URL + '/pedido_emprestimo_parte04', {
                banco_id: banco_id,
                nro_agencia: nro_agencia,
                nro_conta:nro_conta,
                tipo_conta: tipo_conta,
                conta_desde: conta_desde,
                nome_ref_pessoal: nome_ref_pessoal,
                cpf_ref_pessoal: cpf_ref_pessoal,
                grau_rel: grau_rel,
                tel_relacionamento: tel_relacionamento




            })
                .then(function (response) {
                    console.log(response);

                    step = 2;


                    $('#form-3').collapse('toggle');
                })
                .catch(function (error) {
                    console.log(error);
                });
            // data-admissa

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
