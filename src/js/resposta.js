$(document).ready(function() {
    $("#formresposta").on("submit", function(event) {
        if (true)
        {
            event.preventDefault();

            $.ajax({
                type: "POST",
                url: "exec/gravarResposta.php",
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
                    console.log(msg);
                    var result_msg = JSON.parse(msg);
                    if(result_msg.resposta === 200)
                    {
                        console.log(result_msg.respcodigo);
                        $("#pergcodigo").val(result_msg.respgcodigo);
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

function ResetFormResposta()
{
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

function ExcluirResposta()
{
    
}

function EnviarResposta()
{
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
            MostraModalResposta();
   });
}

function buscarRespostas(pergunta_id){
    var json = {id:pergunta_id};
    $.post("exec/buscarRespostas.php",json,function (result){
        var jarr=JSON.parse(result);
        var table = gerarTabelaRespostas(jarr);
        //content.html(table);
        $("#content").html(table);

    });
}

function gerarTabelaRespostas(jarr){
    var myTable="";
    myTable = "<table id=\"table_respostas\" class=\"table table-striped\">";
    myTable+= "<thead class=\"thead-dark\">";
    myTable+= "<tr>";
    myTable+= "<th scope=\"col\">Texto</th>";
    myTable+= "<th scope=\"col\">Correta</th>";
    myTable+= "<th scope=\"col\">Proximidade Correta</th>";
    myTable+= "<th scope=\"col\">Opções</th>";
    myTable+= "</tr></thead>";
    myTable+= "<tbody>";
    if (jarr.length===0)
    {

        myTable+= "<tr>";
        myTable+= "<td colspan=\"4\">Não foram encontrados clientes com os parâmetros informados</td>";
        myTable+= "</tr></tbody></table>";
        return  myTable;

    }
    for (var i in jarr)
    {
        myTable+="<tr id=\""+jarr[i].Id+"\">";
        myTable+="<td>"+jarr[i].Texto+"</td>";
        myTable+="<td>"+jarr[i].Correta+"</td>";
        myTable+="<td>"+jarr[i].NivelProximidadeCorreta+"</td>";
        myTable+=criarCelulaOpcoes(jarr[i].Id);
        myTable+="</tr>";
    }
        myTable+="</tbody></table>";
        return myTable;
}

function criarCelulaOpcoes(id){
    var html = "";
    html += "<td >";
    html += "<a href='javascript:void(0);' onclick='editRowRespsposta(\""+id+"\")'>";
    html += "<i class='material-icons'>create</i></a>";
    html += "<a href='#'>";
    html += "<i class='material-icons'>delete</i></a>";
    html += "</td >";
    return html;
}

function editRowRespsposta(){


}