// jQuery(function($){
    $("#form-3 input[name=cep]").change(function(){
        var cep_code = $(this).val();
        if( cep_code.length <= 0 ) return;
        $.get("http://apps.widenet.com.br/busca-cep/api/cep.json", { code: cep_code },
            function(result){
                if( result.status!=1 ){
                    alert(result.message || "Houve um erro desconhecido");
                    return;
                }
                // $("#form-3 input[name=cep]").val( result.code );
                $("#form-3 input[name=uf]").val( result.state.toLowerCase() );
                $("#form-3 #uf").val( result.state.toLowerCase() );
                $("#form-3 input[name=cidade]").val( result.city );
                $("input#bairro").val( result.district );
                $("input#endereco").val( result.address );
                $("input#estado").val( result.state );
            });
    });
// });

$("#form-2 input[name=endereco_comercial_cep]").change(function(){
    var cep_code = $(this).val();
    if( cep_code.length <= 0 ) return;
    $.get("http://apps.widenet.com.br/busca-cep/api/cep.json", { code: cep_code },
        function(result){
            if( result.status!=1 ){
                alert(result.message || "Houve um erro desconhecido");
                return;
            }
            // $("#form-2 input[name=cep]").val( result.code );
            $("#form-2 input[name=endereco_comercial_cep]").val( result.code );
            $("#form-2 #endereco_comercial_uf").val( result.state.toLowerCase() );
            $("#form-2 input[name=endereco_comercial_cidade]").val( result.city );
            // $("input#bairro").val( result.district );
            // $("input#endereco").val( result.address );
            // $("input#estado").val( result.state );
        });
});


