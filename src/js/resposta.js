var jarrResp;
var respEditada = {};

$(document).ready(function() {
    /*
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
                  
                    if(msg == 'ok'){
                        $('#fupForm')[0].reset();
                        $('.statusMsg').html('<span style="font-size:18px;color:#34A853">Form data submitted successfully.</span>');
                    }else{
                        $('.statusMsg').html('<span style="font-size:18px;color:#EA4335">Some problem occurred, please try again.</span>');
                    }
                  
                    
                   $('#fupForm').css("opacity","");
                   $(".submitBtn").removeAttr("disabled");
                }
            });
        }
        event.preventDefault();

    });*/
    var PerguntaCodigo = $("#pergcodigo").val();
    if (PerguntaCodigo !== '')
    {
       mostrarTabelaResposta();
       buscarRespostas(PerguntaCodigo);
       console.log("aqui");
    }
});

function ResetFormResposta()
{
    $( "label.active" ).removeClass( "active" );

    $("#formresposta")[0].reset();
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

function ExcluirResposta(id)
{
    if (id !== "new")
    {
        console.log("Excluindo " + id + "do banco");
    }
    
}
function PreparaJsonGravacao(id)
{ 
    var pergunta_id = $("#pergcodigo").val();
    var obj = getRowEditableContent(id);
    console.log(obj);
    if (id === "new")
        id = '';
    var json = {
        respcodigo: id,
        pergunta_id: pergunta_id,
        resptexto: obj.Texto,
        respcorreta: obj.Correta,
        nivelproxcorreta: obj.NivelProximidadeCorreta
    };
    return json;
}

function eviarResposta(json)
{
    $.post("exec/gravarResposta.php",json,function(msg){
            var result_msg = JSON.parse(msg);
            if(result_msg.resposta === 200)
            {
                console.log(result_msg.pergcodigo);
                $("#pergcodigo").val(result_msg.pergcodigo);
                $("#pergunta_id").val(result_msg.pergcodigo);
            }
            resp = result_msg.resposta;
            console.log(resp);
   });
}

function buscarRespostas ( pergunta_id, array, i, doneCallback )
{
    var json = {pergunta:pergunta_id};
    $.post("exec/buscarRespostas.php",json,function (result){
        var jarrResp=JSON.parse(result);
        console.log(jarrResp);
        //if($("#table_respostas").length === 0)
        //    mostrarTabelaResposta();
        //var rows = popularTabelaRespostas(jarrResp);
        //$("#table_respostas tr:last").after(rows);
        array[i].arrRespostas = jarrResp;
        doneCallback();
    });
}

function popularTabelaRespostas(jarrResp){
    var myTable = "";
    if (jarrResp.length===0)
    {

        myTable+= "<tr>";
        myTable+= "<td colspan=\"4\">Esta pergunta ainda não possui opções de resposta</td>";
        myTable+= "</tr></tbody></table>";
        return  myTable;

    }
    for (var i in jarrResp)
    {
       myTable += setRowContent(jarrResp[i]);
    }
    return myTable;
}

function criarCelulaOpcoes(id){
    var html = "";
    html += "<td >";
    if(id === "new")
    {
        html += "<a href='javascript:void(0);'>";
    }
    else {
        html += "<a href='javascript:void(0);' onClick='editRowRespsposta(\""+id+"\")'>";
    }
    html += "<i class='material-icons editar'>create</i></a>";
    html += "<a href='javascript:void(0);' onClick='ExcluirResposta(\""+id+"\")'>";
    html += "<i class='material-icons'>delete</i></a>";
    html += "</td >";
    return html;
}

function criarCelulaOpcoesEditar(id){
    var html = "";
    html += "<td >";
    html += "<a href='javascript:void(0);' onClick='salvarResposta(\""+id+"\")'>";
    html += "<i class='material-icons'>save</i></a>";
    html += "<a href='javascript:void(0);' onClick='limparAlteracoesResposta(\""+id+"\")'>";
    html += "<i class='material-icons'>history</i></a>";
    html += "</td >";
    return html;
}

function editRowRespsposta(id)
{
    let row = $("#"+id);
    let obj = getRowContent(id);
    respEditada = obj;
    let editableRow = createEditableRowResposta(obj);    
    
    row.replaceWith(editableRow);
}

function getRowContent(id)
{
    let row = $("#"+id);
    let cells = row.children();
    let obj = new Object();
    obj.Id = id;
    obj.Texto = cells[0].innerText ;
    obj.Correta = cells[1].innerText ;
    obj.NivelProximidadeCorreta = cells[2].innerText ;
    return obj;
    /*
    for(var i=0;i<3;i++)
    {
        var cel = $(cells[i]);
        console.log($(cells[i]).text());
        var tmp = cel.text();
        cel.html("<input type='text' value='" + tmp + "'>");       
    }*/
}

function setRowContent(rowObj)
{
    let rowHtml = "<tr id=\""+rowObj.Id+"\">";
    rowHtml+="<td>"+rowObj.Texto+"</td>";
    rowHtml+="<td>"+rowObj.Correta+"</td>";
    rowHtml+="<td>"+rowObj.NivelProximidadeCorreta+"</td>";
    rowHtml+= criarCelulaOpcoes(rowObj.Id);
    rowHtml+="</tr>";
    return rowHtml;
}

function getRowEditableContent(id)
{
    let row = $("#"+id);
    let cells = row.children();
    let obj = new Object();
    obj.Id = id;
    obj.Texto = cells[0].lastChild.value ;
    obj.Correta = cells[1].lastChild.value ;
    obj.NivelProximidadeCorreta = cells[2].lastChild.value ;
    return obj;
}

function createEditableRowResposta(obj)
{
    let newRow = "<tr id=\""+ obj.Id +"\">";
    newRow += createTd(createInputField(obj.Texto));
    newRow += createTd(createComboBox(obj.Correta));
    newRow += createTd(createComboBox(obj.NivelProximidadeCorreta));
    newRow += criarCelulaOpcoesEditar(obj.Id);
    newRow +="</tr>";
    return newRow;
}

function createNewRow(){
    let obj = {Id:"new", Texto:"", Correta:"", NivelProximidadeCorreta:""};
    let row = createEditableRowResposta(obj);
    $("#novalinha").after(row);    
}

function createTd(html)
{
    return "<td>" + html + "</td>";
}

function createInputField(value)
{
    return "<input type='text' value='" + value + "'>";
}

function createComboBox(value)
{
    return "<input type='text' value='" + value + "'>";
}

function mostrarTabelaResposta(){
    var header = "<hr /><h3>Respostas</h3><br />";
    var myTable= header;    
    myTable = "<table id=\"table_respostas\" class=\"table table-striped\">";
    myTable+= "<thead class=\"thead-dark\">";
    myTable+= "<tr>";
    myTable+= "<th scope=\"col\">Texto</th>";
    myTable+= "<th scope=\"col\">Correta</th>";
    myTable+= "<th scope=\"col\">Proximidade Correta</th>";
    myTable+= "<th scope=\"col\">Opções</th>";
    myTable+= "</tr></thead>";
    myTable+= "<tbody>";
    myTable+= "<tr id=\"novalinha\">";
    myTable+= "<td colspan=\"6\">";
    myTable+= "<button id=\"novaresposta\" class=\"btn btn-link\"";
    myTable+= " onClick='createNewRow()'";
    myTable+= " >";
    myTable+= "<i class=\"material-icons\">add_circle</i> Nova Opção";
    myTable+= "</button>";
    myTable+= "</td>";
    myTable+= "</tr>";
    myTable+="</tbody></table>";
    $("#content").html(myTable);
    //return myTable;
}

function salvarResposta(id)
{
    console.log("Salvando " + id);
    var json = PreparaJsonGravacao(id);
    eviarResposta(json);
    
}

function limparAlteracoesResposta(id)
{
    console.log("Limpando alteracoes de " + id);
}