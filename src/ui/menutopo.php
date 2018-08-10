<?php
//informar páginas separadas por vírgulas
function verificarMenuAtivo($paginas)
{
    if (strpos($paginas, basename($_SERVER['PHP_SELF'])) !== FALSE)
    {
        return ' active';
    }

    return '';
}
?>
<nav class="navbar navbar-expand-md navbar-dark" style="background-color: #75A5B8">
    <a class="navbar-brand" href="principal.php">
        Quiz Creator
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item<?php echo(verificarMenuAtivo('quizzes.php, quiz.php')); ?>">
                <a class="nav-link" href="quizzes.php">Quizzes</a>
            </li>
        </ul>
    </div>
</nav>