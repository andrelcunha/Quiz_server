<?php
class TipoResposta
{
    public $Id;
    public $Nome;
    public $ETexto;
    public $TemOpcoes;
    public $MultiplasSelecoes;
    public $QuantidadeOpcoesTela;
    public $ApenasTodasSaoCorretas;

    function Listar()
    {
        $lista      = array();

        $sql        =   'SELECT   tiporesposta_id, tiporesposta_nome, tiporesposta_texto, tiporesposta_opcoes, tiporesposta_multiselecoes, ' .
                        'tiporesposta_qtdeopcoes, tiporesposta_constodascorretas ' .
                        'FROM     tiposrespostas';

        $bd         = new BancoDados();
        $resultado  = $bd->selecionar($sql);

        if ($resultado != null)
        {
            while ($registro = $resultado->fetch_object())
            {
                $objeto                         = new TipoResposta();
                $objeto->Id                     = $registro->tiporesposta_id;
                $objeto->Nome                   = $registro->tiporesposta_nome;
                $objeto->ETexto                 = $registro->tiporesposta_texto;
                $objeto->TemOpcoes              = $registro->tiporesposta_opcoes;
                $objeto->MultiplasSelecoes      = $registro->tiporesposta_multiselecoes;
                $objeto->QuantidadeOpcoesTela   = $registro->tiporesposta_qtdeopcoes;
                $objeto->ApenasTodasSaoCorretas = $registro->tiporesposta_constodascorretas;

                $lista[]                        = $objeto;
            }
        }
        
        return $lista;
    }
}