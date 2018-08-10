<?php
function carregamento($classe)
{
    require_once("../lib/$classe.php");
}

spl_autoload_register('carregamento');