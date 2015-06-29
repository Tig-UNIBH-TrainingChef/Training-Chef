<?php

require_once "{$_SERVER['DOCUMENT_ROOT']}/trainingchef/Core/AutoLoad.php";

/**
 * Classe que representa a entidade postagem
 * @author Victor Vaz <victor-vaz@hotmail.com>
 */
class Postagem implements Entidade
{
    private $idpostagem;
    private $Usuario;
    private $texto;
    private $data;
    
    public function __construct($idPostagem = null, Usuario $Usuario = null, $texto = null, $data = null)
    {
        $idPostagem ? $this->setIDPostagem($idPostagem) : null;
        $Usuario    ? $this->setUsuario($Usuario)       : null;
        $texto      ? $this->setTexto($texto)           : null;
        $data       ? $this->setData($data)             : null;
    }
    
    public function getIDPostagem(){
        return $this->idpostagem;
    }
    public function setIDPostagem($id){
        $this->idpostagem = $id;
    }
    
    public function getUsuario(){
        return $this->Usuario;
    }
    public function setUsuario(Usuario $Usuario){
        $this->Usuario = $Usuario;
    }
    
    public function getTexto(){
        return $this->texto;
    }
    public function setTexto($texto){
        $this->texto = $texto;
    }
    
    public function getData(){
        return $this->data;
    }
    public function setData($data){
        $this->data = $data;
    }
}