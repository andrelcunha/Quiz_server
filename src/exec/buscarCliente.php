<?php
if (isset($_POST['Nome']))      $nome       = $_POST['Nome'];       else $nome      = '';
if (isset($_POST['Empresa']))   $empresa    = $_POST['Empresa'];    else $empresa   = '';
if (isset($_POST['Setor']))     $setor      = $_POST['Setor'];      else $setor     = '';

require_once('autoload.php');
require_once('../constantes.php');

$clientes   = Cliente::ListarBusca($nome, $empresa, $setor);

$html       =   '<table class="table table-striped">' .
                    '<thead class="thead-dark">' .
                        '<tr>' .
                            '<th scope="col">&nbsp;</th>' .
                            '<th scope="col">Nome</th>' .
                            '<th scope="col">Empresa</th>' .
                            '<th scope="col">Setor</th>' .
                        '</tr>' .
                    '</thead>' .
                    '<tbody>';

if (count($clientes) > 0)
{
    foreach ($clientes as $cliente)
    {
        $descricao  =       $cliente->Empresa . ($cliente->Setor != '' ? " - $cliente->Setor" : '');
        $retorno    =       base64_encode("{ \"id\": \"$cliente->Id\", \"chave\": \"$cliente->Nome\", \"descricao\": \"$descricao\" }");

        $html   .=          '<tr>' .
                                "<td><button id=\"cmdSelCliente$cliente->Id\" type=\"button\" class=\"btn btn-link\" value=\"$retorno\" onclick=\"SelecionarRegistro(this)\">" .
                                '<i class="material-icons">done</i></button></td>' .
                                "<td>$cliente->Nome</td>" .
                                "<td>$cliente->Empresa</td>" .
                                "<td>$cliente->Setor</td>" .
                            '</tr>';
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