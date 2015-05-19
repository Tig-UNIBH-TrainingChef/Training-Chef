<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Core/AutoLoad.php';

/**
 * Classe que representa a entidade Forma de Contato
 * @author Victor Vaz <victor-vaz@hotmail.com>
 */
class FormaDeContato
{
    private $idFormaDeContato;
    private $TipoContato;
    private $idUsuario;
    private $valor;
    
    public function getIDFormaDeContato(){
        return $this->idFormaDeContato;
    }
    public function setIDFormaDeContato($id){
        $this->idFormaDeContato = $id;
    }
    
    public function getTipoContato(){
        return $this->TipoContato;
    }
    public function setTipoContato(TipoContato $TipoContato){
        $this->TipoContato = $TipoContato;
    }
    
    public function getIDUsuario(){
        return $this->idUsuario;
    }
    public function setIDUsuario($id){
        $this->idUsuario = $id;
    }
    
    public function getValor(){
        return $this->valor;
    }
    public function setValor($valor){
        $this->valor = $valor;
    }
}