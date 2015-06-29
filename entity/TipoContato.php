<?php

require_once "{$_SERVER['DOCUMENT_ROOT']}/trainingchef/Core/AutoLoad.php";

/**
 * Classe que representa a entidade Tipo de Contato
 * @author Victor Vaz <victor-vaz@hotmail.com>
 */
class TipoContato implements Entidade
{
    private $id;
    private $descricao;
    
    public function __construct($id = null, $descricao = null)
    {
        $id ? $this->setID($id) : null;
        $descricao ? $this->setDescricao($descricao) : null;
    }
    
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