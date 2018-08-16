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

    function Incluir(&$erros)
    {
        $bd     = new BancoDados();

        $id     = $bd->obterNovoUUID();

        if ($id != '')
        {
            $dataini    = 'NULL';
            $datafim    = 'NULL';

            if ($this->DataInicial != '')
            {
                $dataini = $this->ConfiguraData($this->DataInicial);
            }

            if ($this->DataFinal != '')
            {
                $datafim = $this->ConfiguraData($this->DataFinal);
            }

            $status_id = $this->Status->Id;
            
            $sql    = 'INSERT INTO quizzes ' .
                    '(quiz_id, quiz_nome, quiz_dataini, quiz_datafim, quiz_maxtentativas, quiz_logotipo, quiz_estilo, statusquiz_id, ' .
                    'quiz_perguntasrandom, quiz_aumdificprogr, quiz_pontpadrao) ' .
                    'VALUES ' .
                    "('$id', '$this->Nome', $dataini, $datafim, $this->MaximoTentativas, '$this->Logotipo', " .
                    "'$this->Estilo', $status_id, $this->PerguntasRandomicas, $this->AumentarDificuldadeProgressivamente, " .
                    "$this->PontuacaoPadrao)";

            $this->Id   = $id;
            $resultado  = $bd->executar($sql,$erros);
            return $resultado;
        }
        else
        {
            return false;
        }
    }

    function Alterar(){
        $bd     = new BancoDados();

        //$id     = $this->Id;

        if ($id != '')
        {
            $dataini    = 'NULL';
            $datafim    = 'NULL';

            if ($this->DataInicial != '')
            {
                $dataini = $this->ConfiguraData($this->DataInicial);
            }

            if ($this->DataFinal != '')
            {
                $datafim = $this->ConfiguraData($this->DataFinal);
            }

            $status_id = $this->Status->Id;
            
            $sql    = 'UPDATE quizzes ' .
                    'SET quiz_nome = "' . $this->Nome .'"'. 
                    ', quiz_dataini = ' . $dataini .
                    ', quiz_datafim = ' . $datafim .
                    ', quiz_maxtentativas = ' . $this->MaximoTentativas .
                    ', quiz_logotipo = "' .$this->Logotipo .'"'.
                    ', quiz_estilo = "' . $this->Estilo .'"'.
                    ', statusquiz_id = ' .$status_id .
                    ', quiz_perguntasrandom = ' . $this->PerguntasRandomicas .
                    ', quiz_aumdificprogr = ' . $this->AumentarDificuldadeProgressivamente .
                    ', quiz_pontpadrao = ' . $this->PontuacaoPadrao .
                    'WHERE quiz_id = "'.  $this->Id .'"' ;

            $resultado  = $bd->executar($sql,$erros);
            return $resultado;
        }
        else
        {
            return false;
        }
    }

    function ConfiguraData($data)
    {
        $separador = '/';
        $pos = strpos($data, $separador);
        if($pos === false)
        {
            $separador = '-';
        }
        $data_exp     = explode($separador, $data);
        $dia = '';
        $mes = '';
        $ano = '';
        if(strlen($data_exp[0]>4))
        {
            $ano = $data_exp[0];
            $mes = $data_exp[1];
            $dia = $data_exp[2];                
        }
        else
        {
            $ano = $data_exp[2];
            $mes = $data_exp[1];
            $dia = $data_exp[0];                
        }
        $data_ok    = "'" . sprintf("%04d-%02d-%02d", $ano, $mes, $dia) . "'";
        return $data_ok;
    }

    static function Listar($cliente_id)
    {
        /*
        $lista      = array();

        $sql        =   'SELECT  quiz_id, quiz_nome, quiz_dataini, quiz_datafim, quiz_maxtentativas, quiz_logotipo, quiz_estilo, statusquiz_id, ' .
        'quiz_perguntasrandom, quiz_aumdificprogr, quiz_pontpadrao'. 
        'FROM quizzes' ;

        $where      =   'WHERE ';

        if ($cliente_id != '') 
        {
            $sql    .= 'INNER JOIN quizzes_cliente'.
            $where . 'cliente_id ='  $cliente_id;
        }  
        
        echo($sql);
        $bd         = new BancoDados();
        $resultado  = $bd->selecionar($sql);

        if ($resultado != null)
        {
            while ($registro = $resultado->fetch_object())
            {
                $objeto             = new Cliente();
                $objeto->Id         = $registro->cliente_id;
                $objeto->Nome       = $registro->cliente_nome;
                $objeto->Empresa    = $registro->cliente_empresa;
                $objeto->Setor      = $registro->cliente_setor;
                $objeto->Ativo      = $registro->cliente_ativo;

                $lista[]            = $objeto;
            }
        }
        
        return $lista;
        */
    }

    function PrepararWhere(&$sql, &$where, $campo, $operador, $valor)
    {
        $sql    .=  "$where $campo $operador '$valor' ";
        $where  =   'AND ';
    }
}