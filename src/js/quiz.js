$(document).ready(function() {
    $("#formquiz").on("submit", function(event) {
        if (validarCampos())
        {
            event.preventDefault();

            $.ajax({
                type: "POST",
                url: "exec/gravarQuiz.php",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function() {
                    $('.submitBtn').attr("disabled", "disabled");
                    $('#fupForm').css("opacity", ".5");
                },
                success: function(msg){
                    //$('.statusMsg').html('');
                    //console.log(msg);
                    var result_msg = JSON.parse(msg);
                    if(result_msg.resposta == 200)
                    {
                        console.log(result_msg.id);
                        console.log(result_msg.status);
                        $("#codigo").val(result_msg.id);
                        $("#quiz_id").val(result_msg.id);
                    }
                  /*
                    if(msg == 'ok'){
                        $('#fupForm')[0].reset();
                        $('.statusMsg').html('<span style="font-size:18px;color:#34A853">Form data submitted successfully.</span>');
                    }else{
                        $('.statusMsg').html('<span style="font-size:18px;color:#EA4335">Some problem occurred, please try again.</span>');
                    }
                  
                    */
                   $('#fupForm').css("opacity","");
                   $(".submitBtn").removeAttr("disabled");
                }
            });
        }

        event.preventDefault();
    });
});

function validarCampos()
{
    var mensagem    = "";

    if ($("#nome").val().length == 0)
    {
        mensagem    += "<li>Nome do quiz é obrigatório</li>";
    }

    if ($("#cliente").val().length == 0)    
    {
        mensagem    += "<li>O cliente que é dono deste quiz é obrigatório</li>";
    }

    var dataini = null;
    var datafim = null;
    if ($("#dataini").val().length > 0)
    {
        if (!validarData($("#dataini").val()))
        {
            mensagem    += "<li>A data inicial não é válida</li>";
        }
        else
        {
            datainistr = $("#dataini").val().split('/');
            dataini = new Date(datainistr[2], datainistr[1] - 1, datainistr[0]);
        }
    }

    if ($("#datafim").val().length > 0)
    {
        if (!validarData($("#datafim").val()))
        {
            mensagem    += "<li>A data final não é válida</li>";
        }
        else
        {
            datafimstr = $("#datafim").val().split('/');
            datafim = new Date(datafimstr[2], datafimstr[1] - 1, datafimstr[0]);
        }
    }

    if (dataini != null && datafim != null)
    {
        if (dataini > datafim)
        {
            mensagem    += "<li>A data inicial é maior do que a data final</li>";
        }
    }

    if (mensagem.length > 0)
    {
        $("#titerro").html("Não foi possível gravar por alguns problemas no cadastro");
        $("#divtexto").html("<ul>" + mensagem + "</ul>");
        $("#diverros").show();
    }

    return mensagem.length == 0;
}

function validarData(data)
{
    var dtstr = data.split('/');
    var result = false;
    var padraoregex;

    if (dtstr.length > 1)
    {
        padraoregex = /^((((0?[1-9]|[12]\d|3[01])[\.\-\/](0?[13578]|1[02])      [\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|((0?[1-9]|[12]\d|30)[\.\-\/](0?[13456789]|1[012])[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|((0?[1-9]|1\d|2[0-8])[\.\-\/]0?2[\.\-\/]((1[6-9]|[2-9]\d)?\d{2}))|(29[\.\-\/]0?2[\.\-\/]((1[6-9]|[2-9]\d)?(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00)|00)))|(((0[1-9]|[12]\d|3[01])(0[13578]|1[02])((1[6-9]|[2-9]\d)?\d{2}))|((0[1-9]|[12]\d|30)(0[13456789]|1[012])((1[6-9]|[2-9]\d)?\d{2}))|((0[1-9]|1\d|2[0-8])02((1[6-9]|[2-9]\d)?\d{2}))|(2902((1[6-9]|[2-9]\d)?(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00)|00))))$/;
        result = data.match(padraoregex);
    }
    else
    {
        padraoregex = /(\d{4})[-.\/](\d{2})[-.\/](\d{2})/;
        result = data.match(padraoregex);
    }

    return result;
}