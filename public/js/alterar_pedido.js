


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


                var valor_pedido        =   $("#form_alterar_pedido input[name=alterar_valor]").val();
                var qtde_parcelas       =   $('#alterar_parcelas').find(":selected").val();


                axios.post(APP_URL + '/alterar_pedido', {
                    valor_pedido: valor_pedido,
                    qtde_parcelas: qtde_parcelas


                })
                    .then(function (response) {
                        console.log(response);
                        if(response.data == "concluido com sucesso"){

                            location.reload();
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });



            })

