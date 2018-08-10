<?php
class BancoDados
{
    function conectar()
    {
        $arqconfig  = file_get_contents(ROOTPATH . '/config/config.json');
        $config     = json_decode($arqconfig);
        $conexao    = new mysqli($config->bd->servidor, $config->bd->usuario, $config->bd->senha, $config->bd->banco, $config->bd->porta);

        if ($conexao->connect_error)
        {
            die("Ocorreu um erro de conexão: $conexao->connect_errno - $conexao->connect_error");
        }
        
        return $conexao;
    }

    function selecionar($comando)
    {
        $conexao = $this->conectar();

        if ($resultado = $conexao->query($comando))
        {
            return $resultado;
        }

        return null;
    }

    function obterNovoUUID()
    {
        $uuid    = '';
        $conexao = $this->conectar();

        if ($resultado = $conexao->query('SELECT UUID() AS codigo FROM dual'))
        {
            $registro = $resultado->fetch_object();
            $uuid = $registro->codigo;
        }
        
        return $uuid;
    }
}