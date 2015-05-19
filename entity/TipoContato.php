<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Core/AutoLoad.php';

/**
 * Classe que representa a entidade Tipo de Contato
 * @author Victor Vaz <victor-vaz@hotmail.com>
 */
class TipoContato implements Entidade
{
    private $id;
    private $descricao;
    
    public function getID(){
        return $this->id;
    }
    public function setID($id){
        $this->id = $id;
    }
    
    public function getDescricao(){
        return $this->descricao;
    }
    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }
}