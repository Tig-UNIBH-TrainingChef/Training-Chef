<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Core/AutoLoad.php';

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