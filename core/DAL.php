<?php

/**
 * Camada de Acesso a Dados (Data Access Layer)
 */
class DAL
{
    /**
     * Servidor de banco de dados
     * @var String
     */
    private static $SERVIDOR = "mysql.hostinger.com.br";
    /**
     * Banco de dados
     * @var String
     */
    private static $BANCO = "u130531012_tchef";
    /**
     * Usuário do banco de dados
     * @var String
     */
    private static $USUARIO = "u130531012_admin";
    /**
     * Senha do banco de dados
     * @var String
     */
    private static $SENHA = "jALZ7Bj2VZ";
    /**
     * Conexão com o banco de dados
     * @var type 
     */
    private $conexao = null;

    /**
     * Função para conectar no banco de dados.
     */
    public function conectar()
    {
        $this->conexao = mysqli_connect(DAL::$SERVIDOR, DAL::$USUARIO, DAL::$SENHA)
                or die("Não foi possível conectar ao banco de dados");
        mysqli_select_db($this->conexao, DAL::$BANCO);
        
        return $this;
    }
    
    /**
     * Função para executar uma query no banco de dados.
     * @param String $sql
     * @return Resultado da query
     */
    public function query($sql)
    {
        if ($this->conexao == null)
            $this->conectar();
            
        $query = mysqli_query($this->conexao, $sql);
        return $query;
    }
}

?>