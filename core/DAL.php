<?php

class DAL
{
    private $_servidor = "localhost";
    private $_usuario = "root";
    private $_senha = "";
    private $_banco = "training_chef";

    public function conectar()
    {
        $conexao = mysql_connect($this->_servidor, $this->_usuario, $this->_senha)
                or die("Não foi possível conectar ao banco de dados");
        mysql_select_db($this->_banco);
    }
}

?>