<?php
$erros  = array();
if (isset($_POST['quiz_id']))        $quiz_id         = $_POST['quiz_id'];         else    $quiz_id         = '';
if (isset($_POST['pergcodigo']))        $id         = $_POST['pergcodigo'];         else    $id         = '';
//if (isset($_POST['tipoperg']))          $tipoperg       = $_POST['tipoperg'];           else    $erros[]    = '';
if (isset($_POST['enunciadotexto']))    $enunciadotexto    = $_POST['enunciadotexto'];  else    $enunciadotexto    = '';
//if (isset($_POST['enunciadoimagem']))   $enunciadoimagem    = $_POST['enunciadoimagem']; else   $enunciadoimagem    = '';
if (isset($_POST['dificuldade']))       $dificuldade    = $_POST['dificuldade'];        else    $dificuldade    = 1;
if (isset($_POST['resprandom']))        $resprandom    = $_POST['resprandom'];        else    $resprandom    = 'off';
if (isset($_POST['sequencia']))         $sequencia = $_POST['sequencia'];     else    $sequencia = 1;
if (isset($_POST['pontos']))            $pontos = $_POST['pontos'];     else    $pontos = 1;
if (isset($_POST['pergativa']))         $pergativa = $_POST['pergativa'];     else    $pergativa = 'pergativa';
if (isset($_POST['tiposrespostas']))    $tiposrespostas = $_POST['tiposrespostas'];     else    $tiposrespostas = 0;


require_once('autoload.php');
require_once('../constantes.php');

$retorno    = '';

if (count($erros) == 0)
{
    $pergunta = new Pergunta();
    $pergunta->Id = $id;
    $pergunta->Quiz = $quiz_id;
    $pergunta->Enunciado = $enunciadotexto;
    $pergunta->TipoResposta = $tiposrespostas;
    $pergunta->Dificuldade = $dificuldade;
    $pergunta->RespostasRandom = $resprandom;
    $pergunta->Sequencia = $sequencia;
    $pergunta->Pontos = $pontos;
    if ($pergativa == 0)
        $pergunta->Cancelada = 1;
    else
        $pergunta->Cancelada = 0;
    
    $gravou = FALSE;
    $reterros = '*';

    if ($id == '')
    {
        $gravou = $pergunta->Incluir($reterros);
    }
    else
    {
        $pergunta->Id = $id;
        $gravou = $pergunta->Alterar($reterros);
    }
    $myobj->resposta = 0;
    if ($gravou)
    {
            
        $myobj->resposta = 200;
        $myobj->pergcodigo = "$pergunta->Id";
        //$myobj->tipoperg = $pergunta->
        $myobj->enunciadotexto = "$pergunta->Enunciado";
        //$myobj->enunciadoimagem = $pergunta->Enunciado
        $myobj->dificuldade = $pergunta->Dificuldade;
        $myobj->resprandom = "$pergunta->RespostasRandom";
        $myobj->sequencia = $pergunta->Sequencia;
        $myobj->pontos = $pergunta->Pontos;
        $myobj->pergativa = !$pergunta->Cancelada;
        $myobj->tiposrespostas = $pergunta->TipoResposta;
        $myobj->codigo = "$pergunta->Quiz";

        $retorno = json_encode($myobj);
             
    }
    else
    {
        $myobj->resposta = 400;
        $myobj->erros = $reterros;
        /*
        $retorno    = "{ \"resposta\": 400, " .
            "\"erros\": [ ".
            "{ \"erro\": \"$reterros\" }] }";
            */
    }
    $retorno = json_encode($myobj);

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