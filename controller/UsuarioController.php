<?php

require_once "{$_SERVER['DOCUMENT_ROOT']}/trainingchef/Core/AutoLoad.php";

/**
 * Classe controladora para a entidade Usuario
 * @author Victor Vaz <victor-vaz@hotmail.com>
 */
class UsuarioController implements EntidadeAutenticavel
{
    const SESSION_USUARIO = "USUARIO";
    
    /**
     * Método para autenticar um usuario
     * @param \Usuario $Usuario
     */
    public function autenticar(\Entidade $Usuario)
    {
        $UsuarioModel = new UsuarioModel();
        $UsuarioBuscado = $UsuarioModel->buscarPorEmailSenha($Usuario->getEmail(), $Usuario->getSenha());
        
        if (isset($UsuarioBuscado))
        {
            @session_start();
            $_SESSION[UsuarioController::SESSION_USUARIO] = $UsuarioBuscado;
            header("Location: sistema/index.php");
        }
        else
            return false;
    }

    /**
     * Método para finalizar uma sessão
     */
    public function finalizarSessao()
    {
        @session_start();
        @session_destroy();
        $this->validarSessao();
    }

    /**
     * Método para validar uma sessão
     * @return boolean
     */
    public function validarSessao()
    {
        @session_start();
        $resultadoValidacao = false;        
        
        if (isset($_SESSION[UsuarioController::SESSION_USUARIO]))
        {
            $UsuarioModel = new UsuarioModel();
            $UsuarioBuscado = $UsuarioModel->buscarPorIDEmail($_SESSION[UsuarioController::SESSION_USUARIO]->getID(), $_SESSION[UsuarioController::SESSION_USUARIO]->getEmail());
            
            if ($UsuarioBuscado->getID() != "")
                $resultadoValidacao = true;
        }
        else
            $resultadoValidacao = false;
        
        if ($resultadoValidacao == false)
        {
            @session_destroy();
            header("Location: ../logar.php");
            return false;
        }
    }

    /**
     * Método para retornar a instância do usuario da sessão.
     * @return \Usuario
     */
    public function getInstance()
    {
        @session_start();
        return $_SESSION[UsuarioController::SESSION_USUARIO];
    }
    
    /**
     * Método para alterar o nome de um usuário.
     * @param int $id
     * @param string $novoNome
     */
    public function alterarNome($id, $novoNome)
    {
        if (strlen(trim($novoNome)) == 0)
        {
            ?><script> alert("Informe um nome válido!"); </script><?php
        }
        else
        {
            $UsuarioModel = new UsuarioModel();

            $Usuario = new Usuario();
            $Usuario->setID($id);
            $Usuario->setNome(trim($novoNome));

            $UsuarioModel->atualizar($Usuario);
            ?><script>alert("Atualizado com sucesso!");</script><?php
        }
    }
}

?>