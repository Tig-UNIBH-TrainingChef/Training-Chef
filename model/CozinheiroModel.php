<?php

if (file_exists('../core/DAL.php')) { require_once '../core/DAL.php'; }
else { require_once 'core/DAL.php'; }

if (file_exists('../entity/Cozinheiro.php')) { require_once '../entity/Cozinheiro.php'; }
else { require_once 'entity/Cozinheiro.php'; }

if (file_exists('model/Model.php')) { require_once 'model/Model.php'; }
else { require_once 'Model.php'; }

/**
 * Classe modelo para a entidade Cozinheiro
 * @author Victor Vaz de Oliveira <victor-vaz@hotmail.com>
 */
class CozinheiroModel implements Model
{
    /**
     * Função para cadastrar um cozinheiro.
     * @param Cozinheiro $Cozinheiro
     */
    public function cadastrar(Entidade $Cozinheiro)
    {
        $DAL = new DAL();
        $DAL->conectar();
        
        $sql = "INSERT INTO cozinheiro (nome,
                                        email,
                                        senha)
                                VALUES ('" . $Cozinheiro->getNome() . "',
                                        '" . $Cozinheiro->getEmail() . "',
                                        '" . $Cozinheiro->getSenha() . "')";
        mysql_query($sql)
            or die ("Aconteceu um erro: Não foi possível cadastrar o cozinheiro.");
    }
    
    public function atualizar(Entidade $Cozinheiro)
    {
        
    }

    /**
     * Função para buscar um cozinheiro por ID
     * @param int $id
     * @return \Cozinheiro
     */
    public function buscar($id)
    {
        $DAL = new DAL();
        $DAL->conectar();
        
        $sql = "SELECT idcozinheiro,
                       nome,
                       email,
                       senha
                  FROM cozinheiro
                 WHERE idcozinheiro = " . $id;
                   
        $query = mysql_query($sql)
            or die ("Aconteceu um erro: Não foi possível buscar um cozinheiro por e-mail e senha");
        
        $row = mysql_fetch_array($query);
                
        $Cozinheiro = new Cozinheiro();
        $Cozinheiro->setID($row['idcozinheiro']);
        $Cozinheiro->setNome($row['nome']);
        $Cozinheiro->setEmail($row['email']);
        $Cozinheiro->setSenha($row['senha']);

        return $Cozinheiro;
    }
    
    /**
     * Função para buscar cozinheiros por e-mail e senha.
     * @param String $email
     * @param String $senha
     * @return \Cozinheiro Lista de cozinheiros de acordo com a busca.
     */
    public function buscarPorEmailSenha($email, $senha)
    {
        $DAL = new DAL();
        $DAL->conectar();
        
        $sql = "SELECT idcozinheiro,
                       nome,
                       email,
                       senha
                  FROM cozinheiro
                 WHERE email = '{$email}'
                   AND senha = '{$senha}'";
                   
        $query = mysql_query($sql)
            or die ("Aconteceu um erro: Não foi possível buscar um cozinheiro por e-mail e senha");
        
        $ListaCozinheiros = array();
        
        while ($row = mysql_fetch_array($query))
        {        
            $Cozinheiro = new Cozinheiro();
            $Cozinheiro->setID($row['idcozinheiro']);
            $Cozinheiro->setNome($row['nome']);
            $Cozinheiro->setEmail($row['email']);
            $Cozinheiro->setSenha($row['senha']);
            
            $ListaCozinheiros[] = $Cozinheiro;
        }
        
        return $ListaCozinheiros;
    }

    public function buscarTodos()
    {
        
    }

    public function deletar($id)
    {
        
    }

}

?>