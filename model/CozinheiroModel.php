<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Core/AutoLoad.php';

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
        $sql = "INSERT INTO cozinheiro (nome,
                                        email,
                                        senha)
                                VALUES ('" . $Cozinheiro->getNome() . "',
                                        '" . $Cozinheiro->getEmail() . "',
                                        '" . $Cozinheiro->getSenha() . "')";
        $DAL = new DAL();
        $DAL->query($sql);
    }
    
    /**
     * Função para atualizar um cozinheiro
     * @param Entidade $Cozinheiro
     */
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
        $sql = "SELECT idcozinheiro,
                       nome,
                       email,
                       senha
                  FROM cozinheiro
                 WHERE idcozinheiro = " . $id;
        
        $DAL = new DAL();
        $query = $DAL->query($sql);
        $row = mysqli_fetch_array($query);
                
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
        $sql = "SELECT idcozinheiro,
                       nome,
                       email,
                       senha
                  FROM cozinheiro
                 WHERE email = '{$email}'
                   AND senha = '{$senha}'";
                   
        $DAL = new DAL();
        $query = $DAL->query($sql);
        
        $ListaCozinheiros = array();
        
        while ($row = mysqli_fetch_array($query))
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