<?php
require('ui/basicvars.php');
if (isset($_POST['quiz']))          $quiz_id          = $_POST['quiz'];           else $quiz_id         = '';
if (isset($_POST['cliente']))      $cliente_id       = $_POST['cliente'];       else $cliente_id      = '';


$titulo         .= ' [Quizzes]';
$csspersons     = array('geral.css');

require('ui/header.php');
require('ui/menutopo.php');
$clientes = new Cliente();
$clientesarr = $clientes->ListarBusca('','','');

$quizzes = new Quiz();
$quizzesarr = $quizzes->Listar($cliente_id);

?>
<div class="conteudo">
    <h1>Cadastro de Quizzes</h1>
    <hr />
    <div class="row">    
        <div class="col-md-9">
            <a href="quiz.php" class="btn btn-success" role="button">Criar um Quiz</a>
        </div>
        <div class="col-md-2">
            <div class="form-inline">
                <div class="form-group">
                    <label for="cliente">Cliente:</label>
                    <select id="cliente" name="cliente" class="form-control">
                        <option>--- Todos os quizzes ---</option>
                       <?php
                       foreach ($clientesarr as $client)
                       {
                           echo("<option value=\"$client->Id\">$client->Nome</option>\n");
                       }
                       ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-1 text-right" style="border-left: solid 1px #CCCCCC">
            <a href="#" class="btn btn-warning" role="button">Filtrar Lista</a>
        </div>
    </div>
    <br />
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">
                    Nome
                </th>
                <th scope="col">
                    Cliente
                </th>
                <th scope="col">
                    Status
                </th>
                <th scope="col">
                    Op&ccedil;&otilde;es
                </th>
            </tr>
        </thead>
        <tbody>
           <?php
           
            if(count($clientesarr)==0 )
            {
                echo('<tr>
                <td colspan="4" class="text-center">
                    Ainda não há nenhum quiz cadastrado
                </td>
            </tr>');
            }
            else{
                foreach ($quizzesarr as $quiz)
                {
                    echo("<tr>");
                    echo("<td > $quiz->Nome </td >");
                    echo("<td > $quiz->Cliente </td >");
                    echo("<td > $quiz->Status </td >");
                    echo("<td >");
                    echo("<a href='quiz.php?quiz_id=$quiz->Id'>");
                    echo("<i class='material-icons'>create</i>");
                    echo("</a>");
                    echo("<i class='material-icons'>delete</i>");
                    echo("</td >");
                }
            }
            ?>
            
        </tbody>
    </table>
</div>
<?php
require('ui/footer.php');