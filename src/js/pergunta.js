$(document).ready(function() {
    $("#tipopergsel input:radio").on('change', function() {
        if (this.id == "texto")
        {
            $("#divenuntexto").show();
            $("#divenunimagem").hide();
        }
        else
        {
            $("#divenunimagem").show();
            $("#divenuntexto").hide();
        }
    });
});

function EnviarPergunta()
{
    var id = $("#pergcodigo").val();
    var quiz_id = $("#quiz_id").val();
    var texto = $("#enunciadotexto").val();
    var dificuldade = parseInt($('input:radio[name=dificuldade]:checked').val());
    var resprandom = parseInt($('input:radio[name=resprandom]:checked').val());
    var sequencia = parseInt($("#sequencia").val());
    var pontos = parseInt($("#pontos").val());
    var pergativa = parseInt($('input:radio[name=pergativa]:checked').val());
    var tiposrespostas = parseInt($("#tiposrespostas").val());
    
    var json = {
        id:id,
        quiz_id:quiz_id,
        texto:texto,
        dificuldade:dificuldade,
        resprandom:resprandom,
        sequencia:sequencia,
        pontos:pontos,
        pergativa:pergativa,
        tiposrespostas:tiposrespostas};
    
    $.post("exec/gravarPergunta.php",json,function(msg){
            var result_msg = JSON.parse(msg);
            if(result_msg.resposta === 200)
            {
                console.log(result_msg.pergcodigo);
                $("#pergcodigo").val(result_msg.pergcodigo);
                $("#pergunta_id").val(result_msg.pergcodigo);

            }
            resp = result_msg.resposta;
            console.log(resp);
            mostrarTabelaResposta();
            buscarRespostas(result_msg.pergcodigo);
        });
}

function ResetFormPergunta()
{
 //TODO -  adequar ao form Perguntas
    $( "label.active" ).removeClass( "active" );

    $("#formresposta")[0].reset();
    //$("#pergunta_id").val("");
    $("#respcodigo").val("");
    $("#resptexto").val("");
    $("#peso").val(0);

    $("#correta_false").attr( "checked", true );
    var label = $("#correta_false").parent();
    label.addClass('active');

    $("#n1").attr("checked", true);
    label = $("#n1").parent();
    label.addClass('active');
}
