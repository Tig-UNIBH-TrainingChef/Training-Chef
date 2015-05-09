<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Core/AutoLoad.php';

/**
 * Entidade prato
 * @author Victor Vaz de Oliveira <victor-vaz@hotmail.com>
 */
class Prato implements Entidade
{
    private $id;
    private $cozinheiro;
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
    
    public function setCozinheiro(Cozinheiro $Cozinheiro)
    {
        $this->cozinheiro = $Cozinheiro;
    }
    
    public function getCozinheiro()
    {
        return $this->cozinheiro;
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