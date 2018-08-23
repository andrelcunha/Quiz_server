<?php
class Resposta
{
    public $Id;
    public $Texto;
    public $Correta;
    public $NivelProximidadeCorreta;


    public $Pergunta;
    

    function Incluir(&$erros)
    {
        $bd     = new BancoDados();

        $id     = $bd->obterNovoUUID();

        if ($id != '')
        {
                   
            $sql    = 'INSERT INTO opcoesrespostas ' .
                    '(opresposta_id, pergunta_id, opresposta_texto, ' .
                    'opresposta_correta, opresposta_nivelProximidadeCorreta) ' .
                    'VALUES ' .
                    "('$id', '$this->Pergunta','$this->Texto', $this->Correta, $this->NivelProximidadeCorreta)";
            
            //echo($sql);
            $this->Id   = $id;
            $resultado  = $bd->executar($sql,$erros);
            return $resultado;
        }
        else
        {
            return false;
        }
    }

    function Alterar(&$erros){
        
        $bd     = new BancoDados();

        if ($this->Id != '')
        {
            
            $sql =  "UPDATE opcoesrespostas" .
                    " SET opresposta_texto = '$this->Texto'" .
                    ", opresposta_correta = $this->Correta" .
                    ", opresposta_nivelProximidadeCorreta = $this->NivelProximidadeCorreta" .
                    " WHERE opresposta_id = '$this->Id'";
            
            $resultado  = $bd->executar($sql,$erros);
            return $resultado;
        }
        else
        {
            return false;
        }
    }

    static function Listar($pergunta_id)
    {
        $lista      = array();
        $sql        =   'SELECT *  FROM opcoesrespostas ';
        $where      =   ' WHERE ';              
       
        if ($pergunta_id != '') 
        {
            $sql .= $where . "pergunta_id =  '$pergunta_id'";
        }      
        $bd         = new BancoDados();
        $resultado  = $bd->selecionar($sql);
        if ($resultado != null)
        {
            while ($registro = $resultado->fetch_object())
            {
                $objeto = new Resposta();
                $objeto->Id                         = $registro->opresposta_id;
                $objeto->Pergunta                   = $registro->pergunta_id;
                $objeto->Texto                      = $registro->opresposta_texto;
                $objeto->Correta                    = $registro->opresposta_correta;
                $objeto->NivelProximidadeCorreta    = $registro->opresposta_nivelProximidadeCorreta;
                $lista[] = $objeto;
            }
        }
        return $lista;       
    }

    static function Deletar($opresposta_id)
    {
        
        $sql        =   "DELETE FROM opcoesrespostas WHERE opresposta_id = '$opresposta_id'";
        
        $bd         = new BancoDados();
        $resultado  = $bd->selecionar($sql);
        
        return $resultado;        
    }


    function PrepararWhere(&$sql, &$where, $campo, $operador, $valor)
    {
        $sql    .=  "$where $campo $operador '$valor' ";
        $where  =   'AND ';
    }
}