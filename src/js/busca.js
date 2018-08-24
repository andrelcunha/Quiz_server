var classechamadora = '';

$(document).ready(function() {
    $('button[id^="cmdBuscar"]').on("click", function() {
        var classe = this.id.replace('cmdBuscar', '');
        classechamadora = classe;

        var dados = {};

        $('#corpo' + classe).find('input[id^="campo"]').each(function() {
            var cclasse = this.id.replace('campo', '');
            dados[cclasse] = this.value;
        });
        
        $.post("exec/buscar" + classe + ".php", dados)
               .done(function(data) {
                    $("#resultado" + classe).html(data);
               });
    });
});

function SelecionarRegistro(botao)
{
    var valores = Base64.decode(botao.value);
    var json    = JSON.parse(valores);

    var id      = $("#hidid" + classechamadora).val();
    var chave   = $("#hidchave" + classechamadora).val();
    var desc    = $("#hiddesc" + classechamadora).val()

    $("#" + id).val(json.id);
    $("#" + chave).val(json.chave);
    $("#" + desc).val(json.descricao);

    $("#divBuscar" + classechamadora).modal('hide');
}