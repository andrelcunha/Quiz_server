<?php
class StatusQuiz
{
    public $Id;
    public $Nome;
    //Números para indicar a sequência (campo Valor, que não vai para o banco de dados)
    public $Rascunho;               //1
    public $Teste;                  //2
    public $AguardandoLiberacao;    //4
    public $Publicado;              //8
    public $Fechado;                //16
    public $Cancelado;              //32
    public $NivelLiberacao;
    public $TotalNiveis;
    public $Sequencia;
    public $Valor;

    function SelecionarProximaSequencia($atual)
    {
        $sql    = 'SELECT   statusquiz_id, statusquiz_nome, statusquiz_rascunho, statusquiz_teste, statusquiz_publicado, ' .
                  'statusquiz_fechado, statusquiz_cancelado, statusquiz_aguardliberacao, statusquiz_nivelliberacao, ' .
                  'statusquiz_totalniveis, statusquiz_sequencia ' .
                  'FROM     status_quiz ' .
                  "WHERE    statusquiz_sequencia    IN ($atual + 1, 99) " .
                  'LIMIT 0, 1';

        $bd         = new BancoDados();
        $resultado  = $bd->selecionar($sql);

        if ($resultado != null)
        {
            $registro = $resultado->fetch_object();

            $this->Id                   = $registro->statusquiz_id;
            $this->Nome                 = $registro->statusquiz_nome;            
            $this->Rascunho             = $registro->statusquiz_rascunho;
            $this->Teste                = $registro->statusquiz_teste;
            $this->AguardandoLiberacao  = $registro->statusquiz_aguardliberacao;
            $this->Publicado            = $registro->statusquiz_publicado;
            $this->Fechado              = $registro->statusquiz_fechado;
            $this->Cancelado            = $registro->statusquiz_cancelado;
            $this->NivelLiberacao       = $registro->statusquiz_nivelliberacao;
            $this->TotalNiveis          = $registro->statusquiz_totalniveis;
            $this->Sequencia            = $registro->statusquiz_sequencia;
            $this->Valor                = $this->CalcularValor();
        }
    }

    function SelecionarStatus($Id)
    {
        $sql    = 'SELECT   statusquiz_id, statusquiz_nome, statusquiz_rascunho, statusquiz_teste, statusquiz_publicado, ' .
        'statusquiz_fechado, statusquiz_cancelado, statusquiz_aguardliberacao, statusquiz_nivelliberacao, ' .
        'statusquiz_totalniveis, statusquiz_sequencia ' .
        'FROM     status_quiz ' .
        "WHERE    statusquiz_id  =  " . $Id ;

        $bd         = new BancoDados();
        $resultado  = $bd->selecionar($sql);
                
        if ($resultado != null)
        {
            
            $registro = $resultado->fetch_object();

            $this->Id                   = $registro->statusquiz_id;
            $this->Nome                 = $registro->statusquiz_nome;            
            $this->Rascunho             = $registro->statusquiz_rascunho;
            $this->Teste                = $registro->statusquiz_teste;
            $this->AguardandoLiberacao  = $registro->statusquiz_aguardliberacao;
            $this->Publicado            = $registro->statusquiz_publicado;
            $this->Fechado              = $registro->statusquiz_fechado;
            $this->Cancelado            = $registro->statusquiz_cancelado;
            $this->NivelLiberacao       = $registro->statusquiz_nivelliberacao;
            $this->TotalNiveis          = $registro->statusquiz_totalniveis;
            $this->Sequencia            = $registro->statusquiz_sequencia;
            $this->Valor                = $this->CalcularValor();
        }
    }


    function CalcularValor()
    {
        $valor  = 0;

        if ($this->Rascunho)
        {
            $valor  += 1;
        }
        
        if ($this->Teste)
        {
            $valor  += 2;
        }
        
        if ($this->AguardandoLiberacao)
        {
            $valor  += 4;
        }
        
        if ($this->Publicado)
        {
            $valor  += 8;
        }
        
        if ($this->Fechado)
        {
            $valor  += 16;
        }
        
        if ($this->Cancelado)
        {
            $valor  += 323;
        }

        return $valor;
    }
}