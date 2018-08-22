<?php
class QuizCliente
{
    public $Id;
    public $QuizId;
    public $ClienteId;
    
    static function ListarBusca($id, $quiz_id, $cliente_id)
    {
        $lista      = array();

        $sql        =   'SELECT   quizcliente_id, quiz_id, cliente_id' .
                        'FROM     quizzes_cliente ';

        $where      =   'WHERE ';

        if ($id != '')   QuizCliente::PrepararWhere($sql, $where, 'quizcliente_id',   '=', $id,   's');
        if ($quiz_id != '')    QuizCliente::PrepararWhere($sql, $where, 'quiz_id',    'LIKE', $quiz_id,    's');
        if ($cliente_id != '') QuizCliente::PrepararWhere($sql, $where, 'cliente_id', 'LIKE', $cliente_id, 's');

        $bd         = new BancoDados();
        $resultado  = $bd->selecionar($sql);

        if ($resultado != null)
        {
            while ($registro = $resultado->fetch_object())
            {
                $objeto             = new QuizCliente();
                $objeto->Id         = $registro->quizcliente_id;
                $objeto->QuizId     = $registro->quiz_id;
                $objeto->ClienteId  = $registro->cliente_id;
               

                $lista[]            = $objeto;
            }
        }
        
        return $lista;
    }

    function Incluir(&$erros)
    {
        $bd     = new BancoDados();

        $id     = $bd->obterNovoUUID();
                       
        $sql    = 'INSERT INTO quizzes_cliente ' .
                '(quizcliente_id	, quiz_id, cliente_id) ' .
                'VALUES ' .
                "('$id', '$this->QuizId', '$this->ClienteId')";
        
        
        $this->Id   = $id;
        $resultado  = $bd->executar($sql,$erros);
        return $resultado;
    }

    function PrepararWhere(&$sql, &$where, $campo, $operador, $valor)
    {
        $sql    .=  "$where $campo $operador '$valor' ";
        $where  =   'AND ';
    }
}