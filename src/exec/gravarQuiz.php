<?php
$erros  = array();

if (isset($_POST['codigo']))        $id         = $_POST['codigo'];         else    $id         = '';
if (isset($_POST['nome']))          $nome       = $_POST['nome'];           else    $erros[]    = '<li>Nome é obrigatório</li>';
if (isset($_POST['cliente']))       $cliente    = $_POST['cliente'];        else    $erros[]    = '<li>Cliente é obrigatório</li>';
if (isset($_POST['dataini']))       $dataini    = $_POST['dataini'];        else    $dataini    = '';
if (isset($_POST['datafim']))       $datafim    = $_POST['datafim'];        else    $datafim    = '';
if (isset($_POST['tentativas']))    $tentativas = $_POST['tentativas'];     else    $tentativas = 0;

require_once('autoload.php');
require_once('../constantes.php');


$logo       = '';

if (!empty($_FILES['logo']['type']))
{
    $arquivo    = $_FILES['logo']['name'];
    $extval     = array('jpeg', 'jpg', 'png');
    $temp       = explode(".", $_FILES['logo']['name']);
    $extensao   = end($temp);

    if (in_array($extensao, $extval))
    {
        $origem = $_FILES['logo']['tmp_name'];
        $tipo   = pathinfo($origem, PATHINFO_EXTENSION);
        $dados  = file_get_contents($origem);
        $logo   = "data:image/$tipo;base64," . base64_encode($dados);
    }
}

if (isset($_POST['estilo']))        $estilo     = $_POST['estilo'];         else    $estilo = '';
if (isset($_POST['pergrandom']))    $random     = $_POST['pergrandom'];     else    $random = 1;
if (isset($_POST['aumdif']))        $aumdif     = $_POST['aumdif'];         else    $aumdif = 0;
if (isset($_POST['pontospadrao']))  $ptspad     = $_POST['pontospadrao'];   else    $ptspad = 0;

$retorno    = '';

if (count($erros) == 0)
{
    $quiz   = new Quiz();
    
    
    $quiz->Nome = $nome;
    //TODO  fazer quiz_cliente
    $quiz->Status = new StatusQuiz();
    $quiz->Status->SelecionarStatus(1);
    $quiz->DataInicial = $dataini;
    $quiz->DataFinal = $datafim;
    $quiz->MaximoTentativas = $tentativas;
    $quiz->Logotipo = $logo;
    $quiz->Estilo = $estilo;
    $quiz->PerguntasRandomicas = $random;
    $quiz->AumentarDificuldadeProgressivamente = $aumdif;
    $quiz->PontuacaoPadrao = $ptspad;

    $gravou = FALSE;
    $reterros = '*';

    if ($id == '')
    {
        $gravou = $quiz->Incluir($reterros);
    }
    else
    {
        $quiz->Id = $id;
        $gravou = $quiz->Alterar();
    }
    if ($gravou)
    {
        $quiz_status_nome = $quiz->Status->Nome;
        $quiz_status_val = $quiz->Status->Valor;
        $myobj->resposta = 200;
        $myobj->id = "$quiz->Id";
        $myobj->status = "$quiz_status_nome";
        $myobj->valor = $quiz_status_val;
        /*
        $retorno    = "{ \"resposta\": 200, " .
            "\"id\": \"$quiz->Id\", " .
            "\"status\": \"$quiz_status_nome\", " .
            "\"valor\": $quiz_status_val }";
            */
        $retorno = json_encode($myobj);
        
    }
    else
    {
        
        $retorno    = "{ \"resposta\": 400, " .
            "\"erros\": [ ".
            "{ \"erro\": \"$reterros\" }] }";
    }
    
}
else
{
    $retorno    = "{ \"resposta\": 400, \"erros\": [ ";
    $virgula    = '';

    foreach ($erros as $erro)
    {
        $retorno    .=  "$virgula{ \"erro\": \"$erro\" }";
        $virgula    =   ', ';
    }

    $retorno    = "] }";
}

echo($retorno);