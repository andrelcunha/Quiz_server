<?php
/*array(6) {
  ["pergunta_id"]=>
  string(36) "31604841-a631-11e8-bbc6-0800270a6e32"
  ["respcodigo"]=>
  string(36) "8bd6dba9-a63e-11e8-bbc6-0800270a6e32"
  ["enunciadotexto"]=>
  string(6) "O gato"
  ["peso"]=>
  string(1) "1"
  ["respcorreta"]=>
  string(1) "1"
  ["nivelproxcorreta"]=>
  string(1) "2"
}*/

$erros  = array();
if (isset($_POST['pergunta_id']))       $pergunta_id         = $_POST['pergunta_id'];   else    $pergunta_id         = '';
if (isset($_POST['respcodigo']))        $id         = $_POST['respcodigo'];             else    $id         = '';
if (isset($_POST['resptexto']))         $resptexto    = $_POST['resptexto'];            else    $resptexto    = '';
if (isset($_POST['respcorreta']))       $respcorreta    = $_POST['respcorreta'];        else    $respcorreta    = 0;
if (isset($_POST['nivelproxcorreta']))  $nivelproxcorreta = $_POST['nivelproxcorreta']; else    $nivelproxcorreta = 0;


require_once('autoload.php');
require_once('../constantes.php');

$retorno    = '';

if (count($erros) == 0)
{
    $resposta = new Resposta();
    $resposta->Id = $id;
    $resposta->Pergunta = $pergunta_id;
    $resposta->Texto = $resptexto;
    $resposta->Correta = $respcorreta;
    $resposta->NivelProximidadeCorreta = $nivelproxcorreta;
    
    $gravou = FALSE;
    $reterros = '*';

    if ($id == '')
    {
        $gravou = $resposta->Incluir($reterros);
    }
    else
    {
        $resposta->Id = $id;
        $gravou = $resposta->Alterar($reterros);
    }
    $myobj->resposta = 0;
    if ($gravou)
    {
            
        $myobj->resposta = 200;
        $myobj->respcodigo = "$resposta->Id";
        $myobj->pergunta_id = "$resposta->Pergunta";
        $myobj->resptexto = "$resposta->Texto";
        $myobj->respcorreta = $resposta->Correta;
        $myobj->nivelproxcorreta = $resposta->NivelProximidadeCorreta;

        $retorno = json_encode($myobj);
             
    }
    else
    {
        $myobj->resposta = 400;
        $myobj->erros = $reterros;
      
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
