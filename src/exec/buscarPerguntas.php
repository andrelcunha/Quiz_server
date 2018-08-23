<?php

if (isset($_POST['quiz'])){
    $quiz_id = $_POST['quiz'];
}
else
{
    $quiz_id = '';
}

require_once('autoload.php');
require_once('../constantes.php');

//$clientes   = Cliente::ListarBusca($nome, $empresa, $setor);
$respostas   = Pergunta::Listar($quiz_id);
/*
$html       =   '<table class="table table-striped">'.
                    '<thead class="thead-dark">'.
                        '<tr>'.
                            '<th scope="col">Texto</th>'.
                            '<th scope="col">Correta</th>'.
                            '<th scope="col">Proximidade Correta</th>'.
                            '<th scope="col">Opções</th>'.
                        '</tr>'.
                    '</thead>'.
                '<tbody>';

if (count($respostas) > 0)
{
    foreach ($respostas as $resposta)
    {
        //$retorno    =       base64_encode("{ \"id\": \"$resposta->Id\", \"chave\": \"$cliente->Nome\", \"descricao\": \"$descricao\" }");

        $html   .=          "<tr>"
                . "     <td > $resposta->Texto </td>"
                . "     <td > $resposta->Correta </td >"
                . "     <td > $resposta->NivelProximidadeCorreta </td >"
                . "     <td >"
                . "         <a href='javascript:void(0);' onclick='editaResposta($resposta->Id)'>"
                . "             <i class='material-icons'>create</i>"
                . "         </a>"
                . "         <a href='#'>"
                . "             <i class='material-icons'>delete</i>"
                . "         </a>"
                . "     </td >";
    }
}
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
echo(json_encode($respostas));