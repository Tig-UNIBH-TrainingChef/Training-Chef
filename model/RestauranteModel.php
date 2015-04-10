<?php

if (file_exists('../core/DAL.php')) { require_once '../core/DAL.php'; }
else { require_once 'core/DAL.php'; }

if (file_exists('../entity/Restaurante.php')) { require_once '../entity/Restaurante.php'; }
else { require_once 'entity/Restaurante.php'; }

if (file_exists('model/Model.php')) { require_once 'model/Model.php'; }
else { require_once 'Model.php'; }

/**
 * Classe modelo para a entidade Restaurante
 * @author Victor Vaz de Oliveira <victor-vaz@hotmail.com>
 */
class RestauranteModel implements Model
{
    /**
     * Função para cadastrar um Restaurante.
     * @param Restaurante $Restaurante
     */
    public function cadastrar(Entidade $Restaurante)
    {
        $DAL = new DAL();
        $DAL->conectar();
        
        $sql = "INSERT INTO restaurante (nome,
                                        email,
                                        senha)
                                VALUES ('" . $Restaurante->getNome() . "',
                                        '" . $Restaurante->getEmail() . "',
                                        '" . $Restaurante->getSenha() . "')";
        mysql_query($sql)
            or die ("Aconteceu um erro: Não foi possível cadastrar o restaurante.");
    }
    
    public function atualizar(Entidade $Restaurante)
    {
        
    }

    public function buscar($id)
    {
        
    }
    
    /**
     * Função para buscar restaurantes por e-mail e senha.
     * @param String $email
     * @param String $senha
     * @return \Restaurante Lista de restaurantes de acordo com a busca.
     */
    public function buscarPorEmailSenha($email, $senha)
    {
        $DAL = new DAL();
        $DAL->conectar();
        
        $sql = "SELECT idrestaurante,
                       nome,
                       email,
                       senha
                  FROM restaurante
                 WHERE email = '{$email}'
                   AND senha = '{$senha}'";
                   
        $query = mysql_query($sql)
            or die ("Aconteceu um erro: Não foi possível buscar um restaurante por e-mail e senha");
        
        $ListaRestaurantes = array();
        
        while ($row = mysql_fetch_array($query))
        {        
            $Restaurante = new Restaurante();
            $Restaurante->setID($row['idrestaurante']);
            $Restaurante->setNome($row['nome']);
            $Restaurante->setEmail($row['email']);
            $Restaurante->setSenha($row['senha']);
            
            $ListaRestaurantes[] = $Restaurante;
        }
        
        return $ListaRestaurantes;
    }

    public function buscarTodos()
    {
        
    }

    public function deletar($id)
    {
        
    }

}

?>