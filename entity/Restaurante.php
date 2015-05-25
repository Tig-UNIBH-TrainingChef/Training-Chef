<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Core/AutoLoad.php';

/**
 * Classe que representa a entidade Restaurante
 * @author Victor Vaz <victor-vaz@hotmail.com>
 */
class Restaurante implements Entidade
{
    private $idRestaurante;
    private $Usuario;
    private $nome;
    private $imagem;
    private $endereco;
    private $cidade;
    private $codigoPostal;
    
    public function getIDRestaurante(){
        return $this->idRestaurante;
    }
    public function setIDRestaurante($id){
        $this->idRestaurante = $id;
    }
    
    public function getUsuario(){
        return $this->Usuario;
    }
    public function setUsuario(Usuario $usuario){
        $this->Usuario = $usuario;
    }
    
    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    
    public function getImagem(){
        return $this->imagem;
    }
    public function setImagem($imagem){
        $this->imagem = $imagem;
    }
    
    public function getEndereco(){
        return $this->endereco;
    }
    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }
    
    public function getCidade(){
        return $this->cidade;
    }
    public function setCidade($cidade){
        $this->cidade = $cidade;
    }
    
    public function getCodigoPostal(){
        return $this->codigoPostal;
    }
    public function setCodigoPostal($cep){
        $this->codigoPostal = $cep;
    }
}