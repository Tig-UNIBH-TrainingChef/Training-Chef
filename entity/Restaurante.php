<?php

if (file_exists('entity/Entidade.php')) { require_once 'entity/Entidade.php'; }
else { require_once 'Entidade.php'; }

/**
 * Entidade Restaurante
 * @author Victor Vaz de Oliveira <victor-vaz@hotmail.com>
 */
class Restaurante implements Entidade
{
    private $id;
    private $nome;
    private $email;
    private $senha;
    
    public function setID($id)
    {
        $this->id = $id;
    }
    
    public function getID()
    {
        return $this->id;
    }
    
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    
    public function getNome()
    {
        return $this->nome;
    }
    
    public function setEmail($email)
    {
        $this->email = $email;
    }
    
    public function getEmail()
    {
        return $this->email;
    }
    
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }
    
    public function getSenha()
    {
        return $this->senha;
    }
}

?>