<?php
class Cliente
{
    public $Id;
    public $Nome;
    public $Empresa;
    public $Setor;
    public $Ativo;

    static function ListarBusca($nome, $empresa, $setor)
    {
        $lista      = array();

        $sql        =   'SELECT   cliente_id, cliente_nome, cliente_empresa, cliente_setor, cliente_ativo ' .
                        'FROM     clientes ';

        $where      =   'WHERE ';

        if ($nome != '')    Cliente::PrepararWhere($sql, $where, 'cliente_nome',    'LIKE', $nome,    's');
        if ($empresa != '') Cliente::PrepararWhere($sql, $where, 'cliente_empresa', 'LIKE', $empresa, 's');
        if ($setor != '')   Cliente::PrepararWhere($sql, $where, 'cliente_setor',   'LIKE', $setor,   's');

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