<!DOCTYPE html>

<html lang="pt-BR">
    <head>
        <!-- Meta tags requeridos para o Bootstrap 4.x -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- Ícone de favorito -->
        <link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon" />
        <link rel="apple-touch-icon" href="img/favicon/apple-touch-icon.png" />
        <link rel="apple-touch-icon" sizes="57x57" href="img/favicon/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon" sizes="76x76" href="img/favicon/apple-touch-icon-76x76.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-touch-icon-114x114.png" />
        <link rel="apple-touch-icon" sizes="120x120" href="img/favicon/apple-touch-icon-120x120.png" />
        <link rel="apple-touch-icon" sizes="144x144" href="img/favicon/apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon" sizes="152x152" href="img/favicon/apple-touch-icon-152x152.png" />
        <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon-180x180.png" />

        <!-- CSS do Bootstrap -->
        <link rel="stylesheet" href="css/vendor/bootstrap.min.css" />

        <!-- Material Icons -->
        <link rel="stylesheet" href="css/material-icons.css" />

        <?php
        if (count($csspersons) > 0)
        {
            foreach ($csspersons as $css)
            {
                echo("<link rel=\"stylesheet\" href=\"css/$css\" />\n");
            }
        }
        ?>

        <title><?php echo($titulo); ?></title>
    </head>
    <body<?php echo($bodyclasse != '' ? " class=\"$bodyclasse\"": ''); ?>>