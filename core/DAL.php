<?php

/**
 * Camada de Acesso a Dados (Data Access Layer)
 */
class DAL
{
    /*
    private static $SERVIDOR = "mysql.hostinger.com.br";
    private static $BANCO = "u130531012_tchef";
    private static $USUARIO = "u130531012_admin";
    private static $SENHA = "jALZ7Bj2VZ";
    */
    
    private static $SERVIDOR = "localhost";
    private static $BANCO = "u130531012_tchef";
    private static $USUARIO = "root";
    private static $SENHA = "";

    /**
     * Função para conectar no banco de dados.
     */
    public static function conectar()
    {
        $conexao = mysqli_connect(DAL::$SERVIDOR, DAL::$USUARIO, DAL::$SENHA, DAL::$BANCO)
                or die("Não foi possível conectar ao banco de dados");
        return $conexao;
    }
    
    /**
     * Função para executar uma query no banco de dados.
     * @param String $sql
     * @return Resultado da query
     */
    public static function query($sql)
    {
        //print $sql;
        $query = mysqli_query(DAL::conectar(), $sql)
                or die("Aconteceu um erro de query: " . mysqli_error());
        return $query;
    }
}

?>