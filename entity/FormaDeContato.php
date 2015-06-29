<?php

require_once "{$_SERVER['DOCUMENT_ROOT']}/trainingchef/Core/AutoLoad.php";

/**
 * Classe que representa a entidade Forma de Contato
 * @author Victor Vaz <victor-vaz@hotmail.com>
 */
class FormaDeContato implements Entidade
{
    private $idFormaDeContato;
    private $TipoContato;
    private $Usuario;
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
    
    public function getUsuario(){
        return $this->Usuario;
    }
    public function setUsuario(Usuario $Usuario){
        $this->Usuario = $Usuario;
    }
    
    public function getValor(){
        return $this->valor;
    }
    public function setValor($valor){
        $this->valor = $valor;
    }
}