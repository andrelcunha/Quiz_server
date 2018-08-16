<?php
require('ui/basicvars.php');

$titulo         .= ' [Quizzes]';
$csspersons     = array('geral.css');

require('ui/header.php');
require('ui/menutopo.php');
$clientes = new Cliente();
$clientesarr = $clientes->ListarBusca('','','');

$quizzes = new Quiz();
$quizzesarr = $quizzes->Listar();

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
                    <label for="clientes">Cliente:</label>
                    <select id="clientes" name="clientes" class="form-control">
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
            <!--
            <tr>
                <td colspan="4" class="text-center">
                    Ainda não há nenhum quiz cadastrado
                </td>
            </tr>
            -->
            <
        </tbody>
    </table>
</div>
<?php
require('ui/footer.php');