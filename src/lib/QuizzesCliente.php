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

        if ($id != '')   Cliente::PrepararWhere($sql, $where, 'quizcliente_id',   '=', $id,   's');
        if ($quiz_id != '')    Cliente::PrepararWhere($sql, $where, 'quiz_id',    'LIKE', $quiz_id,    's');
        if ($cliente_id != '') Cliente::PrepararWhere($sql, $where, 'cliente_id', 'LIKE', $cliente_id, 's');

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
    }

    function PrepararWhere(&$sql, &$where, $campo, $operador, $valor)
    {
        $sql    .=  "$where $campo $operador '$valor' ";
        $where  =   'AND ';
    }
}