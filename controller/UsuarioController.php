<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Core/AutoLoad.php';

/**
 * Classe controladora para a entidade Usuario
 * @author Victor Vaz <victor-vaz@hotmail.com>
 */
class UsuarioController implements EntidadeAutenticavel
{
    const SESSION_USUARIO = "USUARIO";
    
    /**
     * Função para autenticar um usuario
     * @param \Usuario $Usuario
     */
    public function autenticar(\Entidade $Usuario)
    {
        $UsuarioModel = new UsuarioModel();
        $UsuarioBuscado = $UsuarioModel->buscarPorEmailSenha($Usuario->getEmail(), $Usuario->getSenha());
        
        if ($UsuarioBuscado->getID() != "")
        {
            @session_start();
            $_SESSION[UsuarioController::SESSION_USUARIO] = $UsuarioBuscado;
            header("Location: sistema/index.php");
        }
        else
        {
            return false;
        }
    }

    /**
     * Função para finalizar uma sessão
     */
    public function finalizarSessao()
    {
        @session_start();
        @session_destroy();
        $this->validarSessao();
    }

    /**
     * Função para validar uma sessão
     * @return boolean
     */
    public function validarSessao()
    {
        @session_start();
        $resultadoValidacao = false;        
        
        if (isset($_SESSION[UsuarioController::SESSION_USUARIO]))
        {        
            $Usuario = $_SESSION[UsuarioController::SESSION_USUARIO];

            $UsuarioModel = new UsuarioModel();
            $UsuarioBuscado = $UsuarioModel->buscarPorEmailSenha($Usuario->getEmail(), $Usuario->getSenha());
            
            if ($UsuarioBuscado->getID() != "")
            {
                $resultadoValidacao = true;
            }
        }
        else
        {
            $resultadoValidacao = false;
        }
        
        if ($resultadoValidacao == false)
        {
            @session_destroy();
            header("Location: ../logar.php");
            return false;
        }
    }

    /**
     * Função para retornar a instância do usuario da sessão.
     * @return \Usuario
     */
    public function getInstance()
    {
        @session_start();
        return $_SESSION[UsuarioController::SESSION_USUARIO];
    }

}

?>