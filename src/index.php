<?php
require('ui/basicvars.php');

$bodyclasse     = 'text-center';
$csspersons     = array('login.css');

require('ui/header.php');
?>
    <!--<form class="form-signin" action="principal.php">-->
    <form class="form-signin" action="login.php" method="post">
        <!--<img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72" />-->
        <h1 class="mb-4">Quiz Creator</h1>
        <!--<h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>-->
        <label for="inputEmail" class="sr-only">E-mail</label>
        <input type="text" name="inputEmail"  id="inputEmail" class="form-control" placeholder="E-mail do Expresso" required autofocus />
        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Senha" required />
        <!--<div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>-->
        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2018<?php (date('Y') != '2018' ? '-' . date('Y') : '') ?> Celepar</p>
    </form>
<?php
require('ui/footer.php');