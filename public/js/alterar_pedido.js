


            'use strict';


            $('#exampleModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('whatever') // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                // modal.find('.modal-title').text('Alterar pedido')
                // modal.find('.modal-body input').val(recipient)
            })



            $(document).on('click', '.salvar_alteracao_pedido', function (e) {
                e.preventDefault();


                var valor_pedido        =   $('#banco-id').find(":selected").val();
                var qtde_parcelas       =   $("#form-4 input[name=nro_agencia-name]").val();


                axios.post(APP_URL + '/alterar_pedido', {
                    banco_id: banco_id,
                    nro_agencia: nro_agencia,
                    nro_conta: nro_conta,
                    tipo_conta: tipo_conta,
                    dig_conta: dig_conta,
                    conta_desde: conta_desde,
                    nome_ref_pessoal: nome_ref_pessoal,
                    cpf_ref_pessoal: cpf_ref_pessoal,
                    grau_rel: grau_rel,
                    tel_relacionamento: tel_relacionamento


                })
                    .then(function (response) {
                        console.log(response);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });



            })

