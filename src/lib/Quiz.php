<?php
class Quiz
{
    public $Id;
    public $Nome;
    public $DataInicial;
    public $DataFinal;
    public $MaximoTentativas;
    public $Logotipo;
    public $Estilo;
    public $PerguntasRandomicas;
    public $AumentarDificuldadeProgressivamente;
    public $PontuacaoPadrao;

    public $Status;
    public $Perguntas;

    function Incluir()
    {
        $bd     = new BancoDados();

        $id     = $bd->obterNovoUUID();

        if ($id != '')
        {
            $dataini    = 'NULL';
            $datafim    = 'NULL';

            if ($this->DataInicial != '')
            {
                $dinis      = explode('/', $this->DataInicial);
                $dataini    = "'" . sprintf("%04d-%02d-%02d", $dinis[2], $dinis[1], $dinis[0]) . "'";
            }

            if ($this->DataFinal != '')
            {
                $dfims      = explode('/', $this->DataFinal);
                $datafim    = "'" . sprintf("%04d-%02d-%02d", $dfims[2], $dfims[1], $dfims[0]) . "'";
            }

            $sql    = 'INSERT INTO quizzes ' .
                    '(quiz_id, quiz_nome, quiz_dataini, quiz_datafim, quiz_maxtentativas, quiz_logotipo, quiz_estilo, statusquiz_id, ' .
                    'quiz_perguntasrandom, quiz_aumdificprogr, quiz_pontpadrao) ' .
                    'VALUES ' .
                    "('$id', $this->Nome, $dataini, $datafim, $this->MaximoTentativas, '$this->Logotipo', " .
                    "'$this->Estilo', $this->Status->Id, $this->PerguntasRandomicas, $this->AumentarDificuldadeProgressivamente, " .
                    "$this->PontuacaoPadrao)";

            $this->Id   = $id;
        }
        else
        {
            return false;
        }
    }
}