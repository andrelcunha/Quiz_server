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
    public $Cliente;

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
          
            $sql    = 'INSERT INTO quizzes ' .
                    '(quiz_id, quiz_nome, quiz_dataini, quiz_datafim, quiz_maxtentativas, quiz_logotipo, quiz_estilo, statusquiz_id, ' .
                    'quiz_perguntasrandom, quiz_aumdificprogr, quiz_pontpadrao) ' .
                    'VALUES ' .
                    "('$id', '$this->Nome', $dataini, $datafim, $this->MaximoTentativas, '$this->Logotipo', " .
                    "'$this->Estilo', $this->Status, $this->PerguntasRandomicas, $this->AumentarDificuldadeProgressivamente, " .
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

        if ($this->Id != '')
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
                    ', statusquiz_id = ' . $this->Status .
                    ', quiz_perguntasrandom = ' . $this->PerguntasRandomicas .
                    ', quiz_aumdificprogr = ' . $this->AumentarDificuldadeProgressivamente .
                    ', quiz_pontpadrao = ' . $this->PontuacaoPadrao .
                    ' WHERE quiz_id = "'.  $this->Id .'"' ;
                    
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
        
        $lista      = array();

        $sql        =   'SELECT  '.
        'quizzes.quiz_id, ' .
        'quizzes.quiz_nome, '. 
        'clientes.cliente_nome, '.
        'status_quiz.statusquiz_nome ' .
        'FROM quizzes '.
        'INNER JOIN quizzes_cliente ON quizzes.quiz_id = quizzes_cliente.quiz_id '. 
        'INNER JOIN clientes ON quizzes_cliente.cliente_id = clientes.cliente_id '.
        'INNER JOIN status_quiz ON status_quiz.statusquiz_id = quizzes.statusquiz_id ';

        $where      =   'WHERE ';

        if ($cliente_id != '') 
        {
            $sql .= $where . "clientes.cliente_id =  '$cliente_id'";
        }  
        
        $bd         = new BancoDados();
        $resultado  = $bd->selecionar($sql);

        if ($resultado != null)
        {
            while ($registro = $resultado->fetch_object())
            {
                $objeto             = new Quiz();
                $objeto->Id         = $registro->quiz_id;
                $objeto->Nome       = $registro->quiz_nome;
                $objeto->Cliente    = $registro->cliente_nome;
                $objeto->Status      = $registro->statusquiz_nome;

                $lista[]            = $objeto;
            }
        }
        
        return $lista;
        
        echo("Work in Progress");
    }

    function PrepararWhere(&$sql, &$where, $campo, $operador, $valor)
    {
        $sql    .=  "$where $campo $operador '$valor' ";
        $where  =   'AND ';
    }

    static function Selecionar($quiz_id)
    {
        $bd     = new BancoDados();
         $sql        =   'SELECT  '.
         'quizzes.quiz_id, ' . 
         'quizzes.quiz_nome, '. 
         'quizzes.quiz_dataini, '. 
         'quizzes.quiz_datafim, '. 
         'quizzes.quiz_maxtentativas, '. 
         'quizzes.quiz_logotipo, '. 
         'quizzes.quiz_estilo, '. 
         'quizzes.statusquiz_id, ' .
         'quizzes.quiz_perguntasrandom, '. 
         'quizzes.quiz_aumdificprogr, '. 
         'quizzes.quiz_pontpadrao, ' .
         'clientes.cliente_id '.
         'FROM quizzes ' .
        'INNER JOIN quizzes_cliente ON quizzes.quiz_id = quizzes_cliente.quiz_id '. 
        'INNER JOIN clientes ON quizzes_cliente.cliente_id = clientes.cliente_id ';

        $where      =   'WHERE ';

        if ($quiz_id != '')    Quiz::PrepararWhere($sql, $where, 'quizzes.quiz_id',    '=', $quiz_id,    's');

        //echo($sql);
        $bd         = new BancoDados();
        $resultado  = $bd->selecionar($sql);
       
        if ($resultado != null)
        {
            $registro = $resultado->fetch_object();
            
            $quiz   = new Quiz();
            $quiz->Id               = $registro->quiz_id;
            $quiz->Nome             = $registro->quiz_nome;
            $quiz->DataInicial      = $registro->quiz_dataini;
            $quiz->DataFinal        = $registro->quiz_datafim;
            $quiz->MaximoTentativas = $registro->quiz_maxtentativas;
            $quiz->Logotipo         = $registro->quiz_logotipo;
            $quiz->Estilo           = $registro->quiz_estilo;
            $quiz->Status           = $registro->statusquiz_id;
            $quiz->PerguntasRandomicas                  = $registro->quiz_perguntasrandom;
            $quiz->AumentarDificuldadeProgressivamente  = $registro->quiz_aumdificprogr;
            $quiz->PontuacaoPadrao  = $registro->quiz_pontpadrao;
            $quiz->Cliente          = $registro->cliente_id;
            

            return $quiz;
        }
        
        
    }
}