<?php

// Constantes para tipagem de usuário:
define("TIPO_USUARIO_COZINHEIRO", "COZINHEIRO");
define("TIPO_USUARIO_RESTAURANTE", "RESTAURANTE");

// Constantes para indices da _SESSION:
define("INDICE_SESSION_ID_USUARIO", "ID_USUARIO");
define("INDICE_SESSION_EMAIL_USUARIO", "EMAIL_USUARIO");
define("INDICE_SESSION_SENHA_USUARIO", "SENHA_USUARIO");
define("INDICE_SESSION_TIPO_USUARIO", "TIPO_USUARIO");

class DAL
{
    private $_servidor = "localhost";
    private $_usuario = "962757";
    private $_senha = "tig2015";
    private $_banco = "962757";

    public function conectar()
    {
        $conexao = mysql_connect($this->_servidor, $this->_usuario, $this->_senha)
                or die("Não foi possível conectar ao banco de dados");
        mysql_select_db($this->_banco);
    }
}

?>