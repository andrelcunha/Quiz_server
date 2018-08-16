<?php
if (isset($_POST['Nome']))      $nome       = $_POST['Nome'];       else $nome      = '';
if (isset($_POST['Empresa']))   $empresa    = $_POST['Empresa'];    else $empresa   = '';
if (isset($_POST['Setor']))     $setor      = $_POST['Setor'];      else $setor     = '';

require_once('autoload.php');
require_once('../constantes.php');



?>