/*SIMULAÇÃO*/


// $(document).on('.simulation-box__value', 'click', function(){
//
//     console.log('Teste');
// })



// $("input[name='simulation-box__submit']").change(function() {
//
//
//
//
//
//
// });

var clicks = 0;
var value = 0;
var qtdParcelas = 0;
$(document).on('click','.simulation-box__submit', function(){


    if ( ! $("input[name=\"simulation-value\"]:checked").is(':checked') ){

        return false;
    }
    clicks += 1;



    if(clicks == 1){



        // QUANTO VOCÊ PRECISA
        //verificars se ele preencheu ou então seelecionou
        // var value = $(this).val();



        if(document.querySelector('input[name="simulation-value"]:checked').value){

            // value = document.querySelector('input[name="simulation-value"]:checked').attr("data-value");
            value = $('input[name="simulation-value"]:checked').attr("data-value");

            console.log(value);
        }


        $(".simulation-box form.pt1").css('display','none'); // ocultar formulario
        $(".simulation-box h2.pt1").css('display','none'); // ocultar h2


        //VALOR SEELECIONADO
        //mostrar segundo form

        $(".simulation-box form.pt2").css('display','block'); // ocultar formulario
        $(".simulation-box p.pt2").css('display','block'); // ocultar h2
        $(".simulation-box h2.pt2").css('display','block'); // ocultar h2


        $(".simulation-box p.pt2").html('R$ ' + formatReal( value ));



        //.pt2 simulation-plots
        //adicionar classe selected

        $('.banner__simulation').addClass('simulation-value-selected');
        $('.banner__simulation').removeClass('simulation-value');


    }


    if(clicks == 2){

        if ( ! $("input[name=\"simulation-plots\"]:checked").is(':checked') ){

            return false;
        }
        // alert('testeee');

        $(".simulation-box form.pt2").css('display','none'); // ocultar formulario
        $(".simulation-box h2.pt2").css('display','none'); // ocultar h2
        $(".simulation-box p.pt2").css('display','none');


        //mostrar terceiro form

        $(".simulation-box form.pt3").css('display','block'); // ocultar formulario
        $(".simulation-box p.pt3").css('display','block'); // ocultar h2
        $(".simulation-box h2.pt3").css('display','block'); // ocultar h2


        $(".simulation-box p.pt3").html('R$' + formatReal( value ));


        qtdParcelas = document.querySelector('#pt2 input[name="simulation-plots"]:checked').value;

        $("input[name='simulation-plots2'][value='"+qtdParcelas+"']").prop('checked', true);

        // alert('x');
        // qtdParcelas = document.querySelector('#pt2 input[name="simulation-plots"]:checked').value;



        //add class na quantidade de parcelas selecionada
        //adicionar classe selected
        //
        // $('.banner__simulation').addClass('simulation-value-selected');
        // $('.banner__simulation').removeClass('simulation-value');
    }


    if(clicks == 3){
        // $(".simulation-box form.pt3").css('display','none'); // ocultar formulario
        // $(".simulation-box h2.pt3").css('display','none'); // ocultar h2
        // $(".simulation-box p.pt3").css('display','none'); // ocultar h2
        //
        //
        //
        // //mostrar segundo form
        //
        // $(".simulation-box form.pt4").css('display','block'); // ocultar formulario
        // // $(".simulation-box p.pt4").css('display','block'); // ocultar h2
        // $(".simulation-box h2.pt4").css('display','block'); // ocultar h2
        // $(".simulation-box p.pt4").html(formatReal( value ));





        // $(".simulation-box p.pt3").html(value);

    }


    //// passar para step 2

})



function formatReal( int )
{
    var tmp = int+'';
    tmp = tmp.replace(/([0-9]{2})$/g, ",$1");
    if( tmp.length > 6 )
        tmp = tmp.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");

    return tmp;
}



$('#simulation-cpf').mask('000.000.000-00', {reverse: true});


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
        url:  '{{http://ec2-18-212-126-252.compute-1.amazonaws.com/prj_facilita/public//api/simulador'}}',
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







// $('#tel').mask('(00) 0000-00000');