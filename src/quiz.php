<?php
require('ui/basicvars.php');

$titulo         .= ' [Quiz]';
$csspersons     = array('geral.css');
$jspersons      = array('quiz.js', 'pergunta.js', 'resposta.js','base64.js', 'busca.js');

require('ui/header.php');
require('ui/menutopo.php');
require_once('busca.php');

//Carga de combos iniciais
$tiporesposta   = new TipoResposta();
$tpresparr      = $tiporesposta->Listar();
//$quizzes   = new Quiz();
if (isset($_GET['quiz_id']))
{
    $quiz_id = $_GET['quiz_id'];
    $quiz = Quiz::Selecionar($quiz_id);
    $perguntaarr = Pergunta::Listar($quiz_id);
    $pergunta = reset($perguntaarr);
    $respostaarr = Resposta::Listar($pergunta->Id);
    $resposta = reset($respostaarr);
    $cliente = new  Cliente();
    $cliente->Selecionar($quiz->Cliente);
}        

?>
<div class="conteudo">
    <h1>Cadastro de Quiz</h1>
    <hr />
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-geral-tab" data-toggle="tab" href="#nav-geral" role="tab" aria-controls="nav-geral" aria-selected="true">
                Geral
            </a>
            <a class="nav-item nav-link" id="nav-perguntas-tab" data-toggle="tab" href="#nav-perguntas" role="tab" aria-controls="nav-perguntas" aria-selected="false">
                Perguntas
            </a>
            <a class="nav-item nav-link" id="nav-respostas-tab" data-toggle="tab" href="#nav-respostas" role="tab" aria-controls="nav-respostas" aria-selected="false">
                <!--Usu&aacute;rios Autorizados-->
                Respostas
            </a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-geral" role="tabpanel" aria-labelledby="nav-geral-tab">
            <?php
            require('quiz.aba_geral.php');
            ?>
        </div>
        <div class="tab-pane fade" id="nav-perguntas" role="tabpanel" aria-labelledby="nav-perguntas-tab">
            <?php
            require('quiz.aba_per.php');
            ?>
        </div>
        <!--
        <div class="tab-pane fade" id="nav-usuarios" role="tabpanel" aria-labelledby="nav-usuarios-tab">xxx</div>
        -->
        <div class="tab-pane fade" id="nav-respostas" role="tabpanel" aria-labelledby="nav-respostas-tab">
            <?php
            require('quiz.aba_resp.php');
            ?>
        </div>
    </div>
</div>
<?php
require('ui/footer.php');