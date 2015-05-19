<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Core/AutoLoad.php';

/**
 * Entidade prato
 * @author Victor Vaz de Oliveira <victor-vaz@hotmail.com>
 */
class Prato implements Entidade
{
    private $id;
    private $usuario;
    private $nome;
    private $descricao;
    private $imagem;
    private $receita;
    
    public function setID($id)
    {
        $this->id = $id;
    }
    
    public function getID()
    {
        return $this->id;
    }
    
    public function setUsuario(Usuario $Usuario)
    {
        $this->usuario = $Usuario;
    }
    
    public function getUsuario()
    {
        return $this->usuario;
    }
    
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    
    public function getNome()
    {
        return $this->nome;
    }
    
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }
    
    public function getDescricao()
    {
        return $this->descricao;
    }
    
    public function setImagem($imagem)
    {
        $this->imagem = $imagem;
    }
    
    public function getImagem()
    {
        return $this->imagem;
    }
    
    public function setReceita($receita)
    {
        $this->receita = $receita;
    }
    
    public function getReceita()
    {
        return $this->receita;
    }
}

?>