<?php

require_once "{$_SERVER['DOCUMENT_ROOT']}/trainingchef/Core/AutoLoad.php";

define("TIPO_USUARIO_COZINHEIRO", "C");
define("TIPO_USUARIO_RESTAURANTE", "R");

/**
 * Entidade Usuário
 * @author Victor Vaz de Oliveira <victor-vaz@hotmail.com>
 */
class Usuario implements Entidade
{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $tipoUsuario;
    private $imagem;
    
    public function __construct($id = null, $nome = null, $email = null, $senha = null, $tipo = null, $imagem = null)
    {
        $id     ? $this->setID($id)            : null;
        $nome   ? $this->setNome($nome)        : null;
        $email  ? $this->setEmail($email)      : null;
        $senha  ? $this->setSenha($senha)      : null;
        $tipo   ? $this->setTipoUsuario($tipo) : null;
        $imagem ? $this->setImagem($imagem)    : null;
    }
    
    public function getID(){
        return $this->id;
    }
    public function setID($id){
        $this->id = $id;
    }    
    
    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }    
    
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }    
    
    public function getSenha(){
        return $this->senha;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }
    
    public function getTipoUsuario(){
        return $this->tipoUsuario;
    }
    public function setTipoUsuario($tipo){
        $this->tipoUsuario = $tipo;
    }  
    
    public function getImagem(){
        return $this->imagem;
    }
    public function setImagem($imagem){
        $this->imagem = $imagem;
    }
}

?>