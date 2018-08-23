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

function buscarRespostas(){
    $.getJSON("buscarRespostas.php",function (result){
        jarr=result;
        var table = create_table(jarr);
        content.html(table);
    });
}

function gerarTabelaRespostas(jarr){
    
    /*
else
{
    $html   .=              '<tr>' .
                                '<td colspan="4">Não foram encontrados clientes com os parâmetros informados</td>' .
                            '</tr>';
}

$html       .=      '</tbody>' .
                '</table>';

echo($html);
 */
var myTable="";
myTable = "<table id=\"table_respostas\" class=\"table table-striped\">";
myTable+= "<thead class=\"thead-dark\">";
myTable+= "<tr";
myTable+= "<th scope=\"col\">Texto</th>";
myTable+= "<th scope=\"col\">Correta</th>";
myTable+= "<th scope=\"col\">Proximidade Correta</th>";
myTable+= "<th scope=\"col\">Opções</th>";
myTable+= "</tr></thead>";
myTable+="<tbody>";
if (count(jarr)==0)
for (var resp in jarr)
{
    myTable+="<tr id=>";
    myTable+="<td>"+resp.Texto+"</td>";
    myTable+="<td>"+resp.Correta+"</td>";
    myTable+="<td>"+resp.NivelProximidadeCorreta+"</td>";
    
    myTable+="</tr>";
}
    myTable+="</tbody></table>";
    return myTable;
}

function criarCelulaOpcoes(id){
    var html = "";
    html += "<td >";
    html += "<a href='javascript:void(0);' onclick='editRowRespsposta(id)'>";
    html += "<i class='material-icons'>create</i></a>";
    html += "<a href='#'>";
    html += "<i class='material-icons'>delete</i></a>";
    html += "</td >";
    return html;
}

function editRowRespsposta(){


}