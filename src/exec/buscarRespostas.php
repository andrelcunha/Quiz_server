<?php
if (isset($_POST['pergunta']))
{
    $pergunta_id = $_POST['pergunta'];
}
else
{
    $pergunta_id  = '';
}
require_once('autoload.php');
require_once('../constantes.php');

$respostas   = Resposta::Listar($pergunta_id);
echo(json_encode($respostas));