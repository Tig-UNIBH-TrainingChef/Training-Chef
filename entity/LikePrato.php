<?php

require_once "{$_SERVER['DOCUMENT_ROOT']}/trainingchef/Core/AutoLoad.php";

/**
 * Classe que representa um like no prato
 * @author Victor Vaz <victor-vaz@hotmail.com.br>
 */
class LikePrato implements Entidade
{
    private $Usuario;
    private $Prato;
    
    public function __construct(Usuario $Usuario = null, Prato $Prato = null)
    {
        $Usuario ? $this->setUsuario($Usuario) : null;
        $Usuario ? $this->setPrato($Prato) : null;
    }
    
    public function getUsuario(){
        return $this->Usuario;
    }
    public function setUsuario(Usuario $Usuario){
        $this->Usuario = $Usuario;
    }
    
    public function getPrato(){
        return $this->Prato;
    }
    public function setPrato(Prato $Prato){
        $this->Prato = $Prato;
    }
}