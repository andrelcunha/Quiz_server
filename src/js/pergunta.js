var jarr = {};
var index = -1;

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
    var quiz_id = $("#codigo").val();
    if (quiz_id !== '')
    {
       mostrarTabelaResposta();
       buscarPerguntas(quiz_id);
    }
    //updateNavigationButtons();

});

function buscarPerguntas(quiz_id){
    var json = {quiz:quiz_id};
    console.log("json: "+json);
    $.post("exec/buscarPerguntas.php",json,function (result){
        jarr=JSON.parse(result);
        //console.log(jarr);
        if (jarr.length > 0)
        {    index = 0;
            buscarTodasRespostas();
        }
        //buscarRespostas(jarr[index].Id);
        updateNavigationButtons();


    });
}

function buscarTodasRespostas()
{
    console.log("index = " + index);
    for(var i in jarr)
    {        
        console.log("i = " + i);
        if (i == index)
        {
            buscarRespostas(jarr[i].Id,jarr,i,popularFormPerguntas);
            console.log("aqui");
        }
        else
        {
            buscarRespostas(jarr[i].Id,jarr,i, function(){
                console.log("pergunta id="+ jarr[i].Id +" ok");
            });
        }
    }
    console.log(jarr);
}

function EnviarPergunta()
{
    var json = {
        pergcodigo: $("#pergcodigo").val(),
        quiz_id: $("#quiz_id").val(),
        texto:$("#enunciadotexto").val(),
        dificuldade:parseInt($('input:radio[name=dificuldade]:checked').val()),
        resprandom:parseInt($('input:radio[name=resprandom]:checked').val()),
        sequencia:parseInt($("#sequencia").val()),
        pontos:parseInt($('input:radio[name=pergativa]:checked').val()),
        pergativa:parseInt($('input:radio[name=pergativa]:checked').val()),
        tiposrespostas:parseInt($("#tiposrespostas").val())};
    
    $.post("exec/gravarPergunta.php",json,function(msg){
            var result_msg = JSON.parse(msg);
            if(result_msg.resposta === 200)
            {
                console.log(result_msg);
                var novaPergunta = result_msg.pergunta;
                $("#pergcodigo").val(novaPergunta.Id);
                $("#pergunta_id").val(novaPergunta.Id);
            }
                
            //mostrarTabelaResposta();
            //buscarRespostas(novaPergunta.pergcodigo);
            //buscarPerguntas();
        });
}

function ResetFormPergunta()
{
    $( "label.active" ).removeClass( "active" );
    $("input:checked:enabled").attr("checked",false);

    $("#formpergunta")[0].reset();
    $("#pergcodigo").val("");
    $("#enunciadotexto").val("");
    $("#enunciadoimagem").val("");

    $("#d1").attr( "checked", true );
    var label = $("#d1").parent();
    label.addClass('active');
    
    $("#sequencia").val("");
    $("#pontos").val("");

    
    $("#raleatoria").attr( "checked", true );
    var label = $("#raleatoria").parent();
    label.addClass('active');

    $("#pergativa_true").attr("checked", true);
    label = $("#pergativa_true").parent();
    label.addClass('active');
    
    $("select#tiposrespostas").val(1); 
    
    $("#content").html('');
    updateNavigationButtons();
}

function popularFormPerguntas()
{
    var objPergunta = jarr[index];
    $("#pergcodigo").val(objPergunta.Id);
    $("#enunciadotexto").val(objPergunta.Enunciado);
    //$("#enunciadoimagem").val("");
    $("#sequencia").val(objPergunta.Sequencia);
    $("#pontos").val(objPergunta.Pontos);

    
    var difVal = objPergunta.dificuldade;
    var d = $("input[name=dificuldade][value='"+  difVal +"']").prop("checked",true);
    d.click();
    
    var randVal = objPergunta.RespostasRandom;
    var r = $("input[name=resprandom][value='"+  randVal +"']").prop("checked",true);
    r.click();
    
    var ativaVal = objPergunta.RespostasRandom;
    var a = $("input[name=pergativa][value='"+  ativaVal +"']").prop("checked",true);
    a.click();

    $("#pergativa_true").attr("checked", true);
    label = $("#pergativa_true").parent();
    label.addClass('active');
    
    $("select#tiposrespostas").val(1); 
    
    if(objPergunta.arrRespostas != null)
    {
        if($("#table_respostas").length === 0)
            mostrarTabelaResposta();
        var rows = popularTabelaRespostas(objPergunta.arrRespostas);
        $("#table_respostas tr:last").after(rows);

    }
}

function loadNextObject()
{
    if(index+1<jarr.length)
    {
        index+=1;
        ResetFormPergunta();
        popularFormPerguntas(jarr[index]);
    }
    updateNavigationButtons();
    console.log(index);
}

function loadLastObject()
{
    if (jarr.length>0){
       index = jarr.length-1;
       ResetFormPergunta();
       popularFormPerguntas(jarr[index]);
    }
    updateNavigationButtons();
    console.log(index);
}

function loadPreviousObject()
{
    if(index > 0)
    {
        index-=1;
        ResetFormPergunta();
        popularFormPerguntas(jarr[index]);
    }
    updateNavigationButtons();
    console.log(index);
}

function loadFirstObject()
{
    if (jarr.length>0);{
        index = 0;
        ResetFormPergunta();
        popularFormPerguntas(jarr[index]);
    }
    updateNavigationButtons();
    console.log(index);
}

function updateRegister()
{
    let tmp = index+1;
    $('#registro').text("Registro " + tmp + "/" + jarr.length);
}

function updateNavigationButtons()
{
    updateRegister();
    if(index+1<jarr.length)
    {
        $('#next').prop('disabled', false);
        $('#last').prop('disabled', false);
    }
    else
    {
        $('#next').prop('disabled', true);
        $('#last').prop('disabled', true);

    }
    if(index > 0)
    {
        $('#previous').prop('disabled', false);
        $('#first').prop('disabled', false);
    }
    else
    {
        $('#previous').prop('disabled', true);
        $('#first').prop('disabled', true);
    }
}