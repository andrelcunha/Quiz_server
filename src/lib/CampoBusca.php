<?php
class CampoBusca
{
    public $Rotulo;
    public $Tamanho;
    public $Campo;

    function __construct($rotulo, $tamanho, $campo)
    {
        $this->Rotulo   = $rotulo;
        $this->Tamanho  = $tamanho;
        $this->Campo    = $campo;   
    }
}