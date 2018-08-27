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
$perguntas   = Pergunta::Listar($quiz_id);
echo(json_encode($perguntas));