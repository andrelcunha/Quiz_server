<?php
class Pergunta
{
    public $Id;
    public $Enunciado;
    public $TipoResposta;
    public $Dificuldade;
    public $RespostasRandom;
    public $Sequencia;
    public $Pontos;
    public $Cancelada;
    
    public $Quiz;
    

    function Incluir(&$erros)
    {
        $bd     = new BancoDados();

        $id     = $bd->obterNovoUUID();

        if ($id != '')
        {
                   
            $sql    = 'INSERT INTO perguntas ' .
                    '(pergunta_id, quiz_id, pergunta_enunciado, tiporesposta_id, ' .
                    'pergunta_dificuldade, pergunta_respostasrandom, pergunta_sequencia, ' .
                    'pergunta_pontos, pergunta_cancelada ) ' .
                    'VALUES ' .
                    "('$id', '$this->Quiz','$this->Enunciado', $this->TipoResposta, $this->Dificuldade," .
                    " $this->RespostasRandom, $this->Sequencia, $this->Pontos, $this->Cancelada)";
            
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

    function Alterar(){
        
        $bd     = new BancoDados();

        //$id     = $this->Id;

        if ($id != '')
        {
            
            
            $sql    = '' ;

            $resultado  = $bd->executar($sql,$erros);
            return $resultado;
        }
        else
        {
            return false;
        }
    }

    static function Listar($pergunta_id, $quiz_id)
    {
        $lista      = array();

        $sql        =   'SELECT   pergunta_id, '.
                        'quiz_id, ' .
                        'pergunta_enunciado,' . 
                        'tiporesposta_id, ' .
                        'pergunta_dificuldade, ' . 
                        'pergunta_respostasrandom, '.
                        'pergunta_sequencia, ' .
                        'pergunta_pontos, '. 
                        'pergunta_cancelada ' .
                        'FROM perguntas ';

        $where      =   'WHERE ';

        if ($pergunta_id != '')  Pergunta::PrepararWhere($sql, $where, 'pergunta_id', 'LIKE', $pergunta_id,    's');
        if ($quiz_id != '')      Pergunta::PrepararWhere($sql, $where, 'quiz_id',     'LIKE', $quiz_id,        's');
        

        $bd         = new BancoDados();
        $resultado  = $bd->selecionar($sql);

        if ($resultado != null)
        {
            while ($registro = $resultado->fetch_object())
            {
                $objeto             = new Pergunta();
                $objeto->Id         = $registro->cliente_id;
                $objeto->Quiz         = $registro->quiz_id;
                $objeto->Enunciado       = $registro->pergunta_enunciado;
                $objeto->TipoResposta    = $registro->tiporesposta_id;
                $objeto->Dificuldade      = $registro->pergunta_dificuldade;
                $objeto->RespostasRandom      = $registro->pergunta_respostasrandom;
                $objeto->Sequencia      = $registro->pergunta_sequencia;
                $objeto->Pontos      = $registro->pergunta_pontos;
                $objeto->Cancelada      = $registro->pergunta_cancelada;

                $lista[]            = $objeto;
            }
        }
        
        return $lista;
                
    }

    static function Deletar($pergunta_id)
    {
        $lista      = array();

        $sql        =   'DELETE FROM perguntas ';

        $where      =   "WHERE pergunta_id = '$pergunta_id'";
        $sql .= $where;

        $bd         = new BancoDados();
        $resultado  = $bd->selecionar($sql);

        if ($resultado != null)
        {
            while ($registro = $resultado->fetch_object())
            {
                $objeto             = new Pergunta();
                $objeto->Id         = $registro->cliente_id;
                $objeto->Quiz         = $registro->quiz_id;
                $objeto->Enunciado       = $registro->pergunta_enunciado;
                $objeto->TipoResposta    = $registro->tiporesposta_id;
                $objeto->Dificuldade      = $registro->pergunta_dificuldade;
                $objeto->RespostasRandom      = $registro->pergunta_respostasrandom;
                $objeto->Sequencia      = $registro->pergunta_sequencia;
                $objeto->Pontos      = $registro->pergunta_pontos;
                $objeto->Cancelada      = $registro->pergunta_cancelada;

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