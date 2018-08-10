<?php
function gerarBusca($titulo, $campos, $campoid, $campochave, $campodescricao, $classe)
{
    $html   =   "<div id=\"divBuscar$classe\" class=\"modal\" tabindex=\"-1\" role=\"dialog\">" .
                    '<div class="modal-dialog" role="document">' .
                        '<div class="modal-content">' .
                            '<div class="modal-header">' .
                                "<h5 class=\"modal-title\">$titulo</h5>" .
                                '<button type="button" class="close" data-dismiss="modal" aria-label="Close">' .
                                    '<span aria-hidden="true">&times;</span>' .
                                '</button>' .
                            '</div>' .
                            "<div id=\"corpo$classe\" class=\"modal-body\">" .
                                "<input type=\"hidden\" id=\"hidid$classe\" name=\"hidid$classe\" value=\"$campoid\" />" .
                                "<input type=\"hidden\" id=\"hidchave$classe\" name=\"hidchave$classe\" value=\"$campochave\" />" .
                                "<input type=\"hidden\" id=\"hiddesc$classe\" name=\"hiddesc$classe\" value=\"$campodescricao\" />" .
                                '<p>Para buscar parcialmente, coloque o sinal <strong>%</strong>.</p>';

    foreach ($campos as $campo)
    {
        $html   .=              '<div class="form-group row">' .
                                    "<label for=\"campo$campo->Campo\" class=\"col-sm-2 col-form-label\">$campo->Rotulo</label>" .
                                    "<div class=\"col-sm-$campo->Tamanho\">" .
                                        "<input type=\"text\" class=\"form-control\" id=\"campo$campo->Campo\" />" .
                                    '</div>' .
                                '</div>';
    }

    $html   .=                  '<div class="row">' .
                                    '<div class="col-12">' .
                                        "<button id=\"cmdBuscar$classe\" type=\"button\" class=\"btn btn-info\">Buscar</button>" .
                                    '</div>' .
                                '</div><br />' .
                                "<div id=\"resultado$classe\"></div>" .
                            '</div>' .
                            '<div class="modal-footer">' .
                                '<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>' .
                            '</div>' .
                        '</div>' .
                    '</div>' .
                '</div>';

    echo $html;
}